<?php

class Admin_home extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!isLoggedIn()) {
            redirect('admin/login');
        }
        $this->load->model(array('mytreasure_model'));
    }

    public function index() {
        $this->data['registeredUsers'] = $this->pirate_model->get_many_by('admin', '0');
        $this->data['totalFoundCodes'] = $this->mytreasure_model->get_all();
        $this->template->write_view('content', 'views/admin/home/index', $this->data);
        $this->template->render();
    }

}