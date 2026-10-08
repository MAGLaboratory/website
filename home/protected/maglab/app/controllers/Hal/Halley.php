<?php

namespace Controllers\Hal;

class Halley {
  protected $app;

  public function __construct($app = null){
    $this->app = $app;
    $this->init();
  }

  function init(){
    $this->app->get('/halley/test', [$this, 'test']);
    $this->app->post('/halley/bootup', [$this, 'bootup']);
    $this->app->post('/halley/output', [$this, 'output']);
  }
  
  function test($req, $res){
    var_dump('test ok');
  }

  function bootup($req, $res){
    authenticate($req);
    $session = generate_session();
    save_payload($req);
    echo $session;
  }
  
  function output($req, $res){
    authenticate($req);
    save_payload($req);
    parse_halley_output($req);
    echo 'OK';
  }
  
}
