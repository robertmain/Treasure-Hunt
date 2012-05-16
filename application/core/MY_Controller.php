<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (isLoggedIn()) {
            $this->load->model(array('pirate_model'));
            $this->data['me'] = $this->pirate_model->get($this->session->userdata('id'));
            $this->load->vars($this->data);
        }
    }

}