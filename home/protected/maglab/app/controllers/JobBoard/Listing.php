<?php

namespace Controllers\JobBoard;

use Controllers\PurifierBase as PurifierBase;

class Listing extends PurifierBase {
  protected $db;

  function init(){
    $this->db = \Models\Maria::Instance();
    $this->app->get('/jobs', [$this, 'index']);
    $this->app->get('/jobs/', [$this, 'index']);
    $this->app->get('/jobs/new', [$this, 'add']);
    $this->app->post('/jobs', [$this, 'create']);
    $this->app->get('/jobs/{id}', [$this, 'show'])
      ->add([$this, 'getListing']);
    $this->app->get('/jobs/{id}/edit/{edit_code}', [$this, 'edit'])
      ->add([$this, 'editCheck'])
      ->add([$this, 'getListing']);
    $this->app->put('/jobs/{id}/edit/{edit_code}', [$this, 'update'])
      ->add([$this, 'editCheck'])
      ->add([$this, 'getListing']);
    $this->app->delete('/jobs/{id}/edit/{edit_code}', [$this, 'destroy'])
      ->add([$this, 'editCheck'])
      ->add([$this, 'getListing']);
    $this->app->get('/jobs/{id}/test/{edit_code}', [$this, 'test'])
      ->add([$this, 'editCheck'])
      ->add([$this, 'getListing']);
  }
  
  function index($req, $res){
    $listings = $this->db->findAll("SELECT * FROM `jobs_board` WHERE `end_date` IS NULL OR `end_date` > NOW() ORDER BY id DESC;");
    
    return $this->render($res, 'board/index.php', 'Jobs Listing', array(
      'layout_show_entrances' => true,
      'listings' => $listings
    ));
  }
  
  function add($req, $res){
    return $this->render($res, 'board/add.php', 'Add Job Listing', array());
  }
  
  function create($req, $res){
    $form = $req->getParsedBody();
    $formErrors = array();
    $listing_id = null;
    
    $this->formCheck($form, $formErrors);
    
    if(empty($formErrors)){
      $stmt = $this->db->prepare("INSERT INTO `jobs_board` "
        . "(`created_at`, `end_date`, `title`, `company`, `location`, `pay`, `description`, `more_info_link`, `owner`, `edit_code`, `type`)"
        . " VALUES (NOW(), FROM_UNIXTIME(?), ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $edit_code = $this->generateEditCode();
      $stmt->bind_param('isssssssss',
        $form['end_date_i'],
        $form['title'],
        $form['company'],
        $form['location'],
        $form['pay'],
        $form['description'],
        $form['more_info_link'],
        $form['owner'],
        $edit_code,
        $form['type']);
      if($stmt->execute() and $stmt->affected_rows > 0){
        $listing_id = $stmt->insert_id;
        if(!empty($form['owner'])){
          $form['id'] = $listing_id;
          $form['edit_code'] = $edit_code;
          $emailBody = $this->renderToString('emails/job_board.php', array('listing' => $form));
          $this->emailHtml($form['owner'], 'Your Maglabs Job Posting', $emailBody);
        }
      } 
    }
   
    if($listing_id){
      return $this->redirect($res, "/jobs/{$listing_id}");
      #return $this->render($res, 'board/edit.php', 'Edit Job Listing', array(
      #  'form' => $form,
      #  'successfulCreate' => true
      #));
    } else {
      return $this->render($res, 'board/add.php', 'Add Job Listing', array(
        'form' => $form,
        'formErrors' => $formErrors
      ));
    }
  }
  
  function edit($req, $res){
    $listing = $req->getAttribute('listing');
    return $this->render($res, 'board/edit.php', 'Edit Job Listing', array(
      'form' => (array)$listing
    ));
  }
  
  function update($req, $res){
    $form = $req->getParsedBody();
    $formErrors = array();
    $listing = $req->getAttribute('listing');
    $listing_id = $listing->id;
    $updated = false;
    
    $this->formCheck($form, $formErrors);

    if(empty($formErrors)){
      $stmt = $this->db->prepare("UPDATE `jobs_board` "
        . "SET `end_date` = FROM_UNIXTIME(?), `title` = ?, `company` = ?, `location` = ?, "
        . "`pay` = ?, `description` = ?, `more_info_link` = ?, `owner` = ?, `type` = ? "
        . "WHERE id = ? LIMIT 1");

      $stmt->bind_param('issssssssi',
        $form['end_date_i'],
        $form['title'],
        $form['company'],
        $form['location'],
        $form['pay'],
        $form['description'],
        $form['more_info_link'],
        $form['owner'],
        $form['type'],
        $listing_id);
      if($stmt->execute() and $stmt->affected_rows > 0){
        $updated = true;
      }
    }
    
    if($updated){
      return $this->redirect($res, "/jobs/{$listing_id}");
      #return $this->render($res, 'board/edit.php', 'Edit Job Listing', array(
      #  'form' => $form,
      #  'successfulCreate' => true
      #));
    } else {
      return $this->render($res, 'board/edit.php', 'Edit Job Listing', array(
        'form' => $form,
        'formErrors' => $formErrors
      ));
    }
  }
  
  function show($req, $res, $args){
    $listing = $req->getAttribute('listing');
    return $this->render($res, 'board/show.php', 'Job Listing', array(
      'listing' => $listing
    ));
  }
  
  function destroy($req, $res){
    $listing = $req->getAttribute('listing');
    
    $stmt = $this->db->prepare("DELETE FROM `jobs_board` WHERE id = ? LIMIT 1");
    $stmt->bind_param('i', $listing->id);
    if($stmt->execute() and $stmt->affected_rows > 0){
      return $this->redirect($res, "/jobs");
    } else {
      return $this->render($res, 'board/edit.php', 'Edit Job Listing', array(
        'form' => (array)$listing
      ));
    }
    
  }
  
  function getListing($req, $res, $next){
    $id = (int)$req->getAttribute('route')->getArgument('id');
    $listing = false;
    if($stmt = $this->db->prepare("SELECT * FROM `jobs_board` WHERE id = ?")){
      $stmt->bind_param('i', $id);
      $listing = $this->db->result($stmt, 0);
    }
    $request = $req->withAttribute('listing', $listing);
    $response = $next($request, $res);
    return $response;
    
  }
  
  function editCheck($req, $res, $next){
    $edit_code = $req->getAttribute('route')->getArgument('edit_code');
    $listing = $req->getAttribute('listing');
    $editCheck = false;
    
    if($listing and !empty($listing->edit_code)){
      $editCheck = ($listing->edit_code == $edit_code);
    }
    
    if($editCheck){
      $response = $next($req, $res);
    } else {
      $response = $this->render($res, 'board/noEdit.php', 'Unauthorized');
    }
    
    return $response;
  }
  
  protected function formCheck(&$form, &$formErrors){
    if(empty($form['title'])){
      $formErrors['title'] = 'You must enter a title';
    }
    if(empty($form['company'])){
      $formErrors['company'] = 'You must enter a company';
    }
    if(empty($form['description'])){
      $formErrors['description'] = 'You must enter a description';
    }
    if(!empty($form['end_date'])){
      $form['end_date_i'] = strtotime($form['end_date']);
      if($form['end_date_i'] === false){
        $formErrors['end_date'] = 'Is not valid, please check the format is mm/dd/yyyy. For example: 01/30/2017';
      }
    }
    if(!empty($form['owner'])){
      if(!filter_var($form['owner'], FILTER_VALIDATE_EMAIL)){
        $formErrors['owner'] = 'This is not a valid email address.';
      }
    }
    if(!empty($form['more_info_link'])){
      if(!filter_var($form['more_info_link'], FILTER_VALIDATE_URL)){
        $formErrors['more_info_link'] = 'This is not a valid link.';
      }
      $scheme = explode("://", $form['more_info_link'])[0];
      if($scheme != "http" and $scheme != "https"){
        $formErrors['more_info_link'] = 'This is not a valid link.';
      }
    }
  }
  
  protected function generateEditCode() { 
    return rtrim(strtr(base64_encode(sha1(uniqid(mt_rand(), TRUE), true)), '+/', '-_'), '='); 
  }
  
}
