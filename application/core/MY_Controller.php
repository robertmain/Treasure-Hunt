<?php

class MY_Controller extends CI_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model(array('pirate_model', 'config_model'));
        $this->data['cookielaw'] = $this->config_model->get_by('key','cookielaw')->value;
        if (isLoggedIn()) {
            $this->data['me'] = $this->pirate_model->get($this->session->userdata('id'));
        }
        $this->load->vars($this->data);
    }

}