<?php

class Admin_live extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->template->set_template('live');
        $this->template->write_view('content', 'views/live/index');
        $this->template->render();
    }

}