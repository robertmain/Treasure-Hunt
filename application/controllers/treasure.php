<?php

class Treasure extends MY_PirateController {

    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->template->write_view('content', 'views/treasure/index');
        $this->template->render();
    }

}