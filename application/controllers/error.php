<?php

class Error extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function notfound(){
        $this->load->vars($this->data);
        $this->template->write_view('content','views/error/notfound.php');
        $this->template->render();
    }

}