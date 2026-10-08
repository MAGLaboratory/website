<?php

##### HELPERS
# TODO: Wrap this in an object
function get_mysqli(){
  global $mysqli;
  if($mysqli){
    return $mysqli;
  } else {
    try {
      $mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
    } catch (Throwable $e){
      $mysqli = false;
    }
    if(mysqli_connect_errno()){
      return false;
    }
    return $mysqli;
  }
}

function get_mysqli_or_die(){
  $mysqli = get_mysqli();
  if($mysqli){ return $mysqli; }
  else { die('unable to connect to database'); }
}


function filter_email($text, $html = true){
  $filtered = filter_var($text, FILTER_SANITIZE_EMAIL);
  return ($html ? htmlspecialchars($filtered, ENT_QUOTES | ENT_HTML5) : $filtered);
}

# htmlentities works in value attribute, so no need to use this?
#function filter_text_basic($text, $html = true){
#  return ($html ? htmlspecialchars($text, ENT_QUOTES | ENT_HTML5) : $text);
#}

function filter_text($text){
  return htmlentities($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
}

function random_b64($length = 21){
  return base64url_encode(openssl_random_pseudo_bytes($length));
}

##### END HELPERS

##### HALDOR HELPERS


function base64_urlencode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

# Called on by startup notification to generate a session for the notifier
function generate_session(){
  return base64_urlencode(openssl_random_pseudo_bytes(30));
}

function authenticate($req) {
  if(SKIP_CHECKSUM){
    return true;
  }
  
  global $secret;
  $input = file_get_contents('php://input');
  $session = $req->getHeaderLine('X-Session');
  $hmac = hash_hmac('sha256', $input . $session, $secret, false);
  if($hmac != $req->getHeaderLine('X-Checksum')){
    die("AUTH FAIL");
  } else {
    return true;
  }
}

function save_payload($req){
  $post = json_encode($req->getParsedBody());
  $session = $req->getHeaderLine('X-Session');
  
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }
  
  if($stmt = $mysqli->prepare("INSERT INTO haldor_payloads (payload, session) VALUES (?, ?)")){
    $stmt->bind_param('ss', $post, $session);
    $stmt->execute();
    $stmt->close();
  } else {
    return false;
  }
}

function save_switches($req) {
  $post = $req->getParsedBody();
  $session = $req->getHeaderLine('X-Session');
  $checks = [
    'Front_Door', 
    'Pod_Bay_Door', 
    'Office_Motion', 
    'Shop_Motion', 
    'ConfRm_Motion', 
    'ElecRm_Motion', 
    'ShopB_Motion', 
    'Open_Switch', 
    'Bay_Temp', 
    'Outdoor_Temp', 
    'ConfRm_Temp', 
    'ElecRm_Temp', 
    'ShopB_Temp', 
    'Privacy_Switch'
  ];

  mark_old_switches();

  foreach($checks as $i => $sensor){
    if(isset($post[$sensor])){
      update_switch($sensor, $session, $post[$sensor]);
    }
  }

  update_switch('Boot', $session, '1');
}

function mark_old_switches(){
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }
  
  # If the last response we got was over 15 minutes ago, it means we missed 3 update payloads
  # assume we lost connectivity and mark them as ended.
  
  $mysqli->real_query("UPDATE haldor SET end_at = NOW(), mark_at = NOW() WHERE end_at IS NULL AND progress_at < DATE_SUB(NOW(), INTERVAL 15 MINUTE)");

}

function last_sensor_value($sensor, $session){
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }
  
  $query = "SELECT id, last_value FROM haldor WHERE sensor = ? AND end_at IS NULL AND session = ? LIMIT 1";
  
  if($stmt = $mysqli->prepare($query)){
    $stmt->bind_param('ss', $sensor, $session);
    $stmt->execute();
    if($res = $stmt->get_result()){
      $data = $res->fetch_all();
      return $data[0];
    }
    
  }
  
  return NULL;
}

function close_sensor_entry($sensor_id){
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }
  
  $query = "UPDATE haldor SET end_at = NOW() WHERE id = ? AND end_at IS NULL";
  if($stmt = $mysqli->prepare($query)){
    $stmt->bind_param('i', $sensor_id);
    $stmt->execute();
    $stmt->close();
  }
}

function progress_sensor_entry($sensor_id){
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }
  
  $query = "UPDATE haldor SET progress_count = progress_count + 1, progress_at = NOW() WHERE id = ? AND end_at IS NULL";
  if($stmt = $mysqli->prepare($query)){
    $stmt->bind_param('i', $sensor_id);
    $stmt->execute();
    $stmt->close();
  }
}

function update_switch($sensor, $session, $value){
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }
  
  $ival = $value;
  $query = null;
  
  $last = last_sensor_value($sensor, $session);
  
  if(empty($last)){ # No active entry, insert new.
    insert_switch($sensor, $session, $ival);
    return;
  }
  
  if($ival != $last[1]){
    # Item has changed. Close last value and mark change by inserting new value.
    close_sensor_entry($last[0]);
    insert_switch($sensor, $session, $ival);
  } else {
    #Item has not changed. Save it as a progress update
    progress_sensor_entry($last[0]);
  }
}

function set_boot_switch($req, $session){
  $post = $req->getParsedBody();
  
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }

  if($stmt = $mysqli->prepare("INSERT INTO haldor_sessions (session) VALUES (?)")){
    $stmt->bind_param('s', $session);
    $stmt->execute();
  } else {
    return false;
  }
  
  if($stmt = $mysqli->prepare("INSERT INTO haldor_payloads (payload, session) VALUES (?, ?)")){
    $stmt->bind_param('ss', json_encode($post), $session);
    $stmt->execute();
    $stmt->close();
  } else {
    return false;
  }
  
  mark_old_switches();
  insert_switch('Boot', $session);
}

function insert_switch($sensor, $session, $value = '0'){
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }
  
  if($stmt = $mysqli->prepare("INSERT INTO haldor (sensor, last_value, start_at, progress_at, session, created_at) VALUES (?, ?, NOW(), NOW(), ?, NOW())")){
    $stmt->bind_param('sss', $sensor, $value, $session);
    $stmt->execute();
    $stmt->close();
  } else {
    return false;
  }
}

function parse_halley_output($req){
  $post = $req->getParsedBody();
  $session = $req->getHeaderLine('X-Session');
  
  $mysqli = get_mysqli();
  if(!$mysqli){ return false; }
  
  $now = time();
  
  $rfid = null;
  $open_at = null;
  $denied_at = null;

  preg_match_all('/User (\d+) presented tag.+?(denied|granted) access at/s', $post['output'], $matches, PREG_SET_ORDER);
  
  if($stmt = $mysqli->prepare("INSERT INTO space_invaders (keycode, open_at, denied_at, created_at) VALUES (?, FROM_UNIXTIME(?), FROM_UNIXTIME(?), NOW())")){
    foreach($matches as $match){
      $rfid = $match[1];
      if($match[2] == 'denied'){
        $open_at = null;
        $denied_at = $now;
      } else {
        $open_at = $now;
        $denied_at = null;
      }
      $stmt->bind_param('sii', $rfid, $open_at, $denied_at);
      $stmt->execute();
    }
    $stmt->close();
  }
  
  return true;
}
##### END HALDOR HELPERS

##### HAL HELPERS
function timeline_graph_data($from, $to){
  $mysqli = get_mysqli();
  if($stmt = $mysqli->prepare("SELECT sensor, UNIX_TIMESTAMP(start_at), UNIX_TIMESTAMP(progress_at), UNIX_TIMESTAMP(end_at) FROM haldor WHERE start_at BETWEEN FROM_UNIXTIME(?) AND FROM_UNIXTIME(?) AND (end_at IS NULL OR end_at BETWEEN FROM_UNIXTIME(?) AND FROM_UNIXTIME(?))")){
    $stmt->bind_param('iiii', $from, $to, $from, $to);
    $stmt->execute();
    if($res = $stmt->get_result()){
      $data = $res->fetch_all();
      return $data;
    }
  }
  return null;
}

function timeline_graph_json($from, $to){
  $data = timeline_graph_data($from, $to);
  if($data){
    $response = [];
    
    foreach($data as $value){
      $name = str_replace('_', ' ', $value[0]);
      $end_at = $value[1];
      if($value[2] && $value[2] > $end_at){
        $end_at = $value[2];
      }
      
      if($value[3] && $value[3] > $end_at){
        $end_at = $value[3];
      }
      array_push($response, "['{$name}', '', new Date({$value[1]}000), new Date({$end_at}000)]");
    }
  
    $response = implode(",\n", $response);
    return "[{$response}]";
  }  
  # [Name, Subname, from, to]
  return "[]";
}

function get_latest($sensors){
  # uhm, sorry for making so much SQL magic to unpack.
  # the inside portion with MAX(id) gets the latest data indices from the sensors
  # the ORDER BY FIELD( portion basically picks the sensors with a bit of -
  # double-reverse-fudgery to produce a list in the right order 
  $sql = "SELECT sensor, UNIX_TIMESTAMP(progress_at), UNIX_TIMESTAMP(end_at), UNIX_TIMESTAMP(mark_at), last_value, UNIX_TIMESTAMP(start_at) from `haldor` WHERE id IN (SELECT MAX(id) from `haldor` GROUP BY sensor) ORDER BY FIELD(sensor";
  # first reverse
  $sensors = array_reverse($sensors);
  foreach ($sensors as $sensor_name => $value) {
    $sensor_name = str_replace(' ', '_', $sensor_name);
    $sql .= ", '" . $sensor_name . "'";
  }
  # second reverse
  $sql .= ") DESC";
  $mysqli = get_mysqli();
  if(!$mysqli){ return null; }
  if($stmt = $mysqli->prepare($sql)){
    $stmt->execute();
    if($res = $stmt->get_result()){
      $data = $res->fetch_all();
      return $data;
    }
  }

  return null;
}

function latest_changes(){
  define('IPROGRESS', 1);
  define('IEND',      2);
  define('IVALUE',    4);
  define('ISTART',    5);
  $change_items = array(
    'Privacy Switch' => [],
    'Open Switch'    => [],
    'Front Door'     => [],
    'Pod Bay Door'   => [],
    'Office Motion'  => [],
    'Shop Motion'    => [],
    'ConfRm Motion'  => [],
    'ElecRm Motion'  => [],
    'ShopB Motion'   => [],
    'Bay Temp'       => [],
    'Outdoor Temp'   => [],
    'ShopB Temp'     => [],
    'ConfRm Temp'    => [],
    'ElecRm Temp'    => []
  );
  
  $now = time();
  $last_update_time = 0;

  # this bit could skip the sensor name at index 0
  $data = get_latest($change_items);
  $d_i = 0;
  $privacy_value = false;
  foreach($change_items as $sensor => &$value){
    if($data == null){
      array_push($value, 'No Data');
      array_push($value, null);
      array_push($value, false);
      continue;
    }

    $data_line = $data[$d_i];

    # Compute Sensor Types
    if($sensor == 'Privacy Switch'){
      if($data_line[IVALUE] == '1' and $data_line[IEND] == null){
        $privacy_value = true;
      }
    }
    elseif(strpos($sensor, 'Door') !== false){
      if($data_line[IVALUE] == '1' and $data_line[IEND] == null and $privacy_value == false){
        array_push($value, 'Open');
        array_push($value, $data_line[ISTART]);
        array_push($value, true);
      } elseif($privacy_value == true){
        array_push($value, 'Closed');
        array_push($value, $data_line[ISTART] - 86400);
        array_push($value, false);
      } else {
        array_push($value, 'Closed');
        array_push($value, $data_line[ISTART]);
        array_push($value, false);
      }
    }
    elseif(strpos($sensor, 'Motion') !== false){
      if($data_line[IEND] == null && $data_line[IVALUE] == '1' and $data_line[IPROGRESS] > $now - 20*60 and $privacy_value == false){
        array_push($value, 'Moving');
        array_push($value, $data_line[IPROGRESS]);
        array_push($value, true);
      } elseif($privacy_value == true){
        array_push($value, 'No Movement since');
        array_push($value, $data_line[ISTART] - 86400);
        array_push($value, false);
      } else {
        array_push($value, 'No Movement since');
        array_push($value, $data_line[ISTART]);
        array_push($value, false);
      }
    }
    elseif(strpos($sensor, 'Switch') !== false){
      if($data_line[IEND] == null && $data_line[IVALUE] == '1' && $data_line[IPROGRESS] > $now - 20*60){
        array_push($value, 'Flipped ON');
        array_push($value, $data_line[ISTART]);
        array_push($value, true);
      } else {
        array_push($value, 'Flipped OFF');
        array_push($value, $data_line[ISTART]);
        array_push($value, false);
      }
    }
    elseif(strpos($sensor, 'Temp') !== false){
      # Output cursed temperature text strings if the temperature is not reported
      if (preg_match('/[^-0-9]+/', $data_line[IVALUE])) {
        array_push($value, $data_line[IVALUE]);
      } else {
        array_push($value, '' . sprintf("%.2f °C/ %.2f °F", (($data_line[IVALUE] | 0) / 1000), ((($data_line[IVALUE] | 0) / 1000)*1.8 + 32)));
      }
      array_push($value, $data_line[IPROGRESS] );
    }
    
    if($value[IPROGRESS] and $value[IPROGRESS] > $last_update_time){
      $last_update_time = $value[IPROGRESS];
    }

    $d_i += 1;
  }

  $change_items['Page Loaded'] = ['at', $now];
  $change_items['LastUpdate'] = ['at', $last_update_time];

  unset($change_items['Privacy Switch']);

  return $change_items;
}

function is_maglabs_open($latest){
  # Space is open when:
  # a) the open switch is flipped "on"
  return $latest['Open Switch'][2];
}

function is_tech_bad(&$latest){
  $last_update_time = $latest['LastUpdate'][1];
  unset($latest['LastUpdate']);
  $now = time();
  
  if($last_update_time <= $now-(60*15)){
    return true; # No response in 15 minutes is bad
  } else {
    return false;
  }
}

##### END HAL HELPERS
