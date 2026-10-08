<?php

namespace Controllers\Hal;

class Haldor {
  protected $app;

  public function __construct($app = null){
    $this->app = $app;
    $this->init();
  }

  function init(){
    $this->app->get('/haldor/test', [$this, 'test']);
    $this->app->get('/haldor/status', [$this, 'status']);
    $this->app->post('/haldor/bootup', [$this, 'bootup']);
    $this->app->post('/haldor/checkup', [$this, 'checkup']);
  }
  
  function test($req, $res){
    var_dump('test ok');
  }
  
  function bootup($req, $res){
    authenticate($req);
    # generate a random number that will be used to identify this session
    $session = generate_session();
    set_boot_switch($req, $session);
    echo $session;
  }
  
  function checkup($req, $res){
    authenticate($req);
    save_payload($req);
    save_switches($req);
    echo 'OK';
  }

  function status($req, $res){
    $latest = latest_changes();
    echo json_encode($latest);
  }
}

