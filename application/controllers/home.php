<?php

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (isLoggedIn()) {
            redirect('treasure');
        }
    }

    public function index() {
        $this->template->write_view('content', 'views/landing/index');
        $this->template->render();
    }

}
