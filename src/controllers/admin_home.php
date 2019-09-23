<?php

class Admin_home extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!isLoggedIn()) {
            redirect('admin/login');
        }
        $this->load->model(array('mytreasure_model', 'pirate_model'));
        $this->load->helper(array('analytics'));
    }

    public function index() {
        $this->data['registeredUsers'] = $this->pirate_model->get_many_by('admin', '0');
        $this->data['totalCodesInDatabase'] = $this->treasure_model->get_all();
        $this->data['totalFoundCodes'] = $this->mytreasure_model->get_all();
        $this->data['treasure_per_pirate'] = $this->mytreasure_model->treasure_per_pirate();
        $this->data['treasureFoundData'] = $this->mytreasure_model->getTreasureFoundAnalytics();
        $this->data['signupData'] = $this->pirate_model->getSignupAnalytics();
        $this->template->write_view('content', 'views/admin/home/index', $this->data);
        $this->template->render();
    }

}