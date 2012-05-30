<?php

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (isLoggedIn()) {
            redirect('treasure');
        }
        $this->load->model(array('mytreasure_model', 'treasure_model'));
    }

    public function index() {
        $this->data['amountOfTreasure'] = count($this->treasure_model->get_all());
        $this->template->write_view('content', 'views/landing/index', $this->data);
        $this->template->render();
    }

}
