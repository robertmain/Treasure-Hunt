<?php

use App\Core\Controller;

class Admin_live extends Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Mytreasure']);
    }

    public function index() {
        $this->render('partials::live/index', $this->data);
    }

    public function socket() {
        if ($this->uri->segment(4)) {
            $response = $this->Mytreasure->get_new_found($this->uri->segment(4));
        }
        else {
            $response = $this->Mytreasure->get_all_found();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

}
