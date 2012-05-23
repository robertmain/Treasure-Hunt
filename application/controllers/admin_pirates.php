<?php
class Admin_pirates extends Admin_Controller {

    public function __construct() {
        parent::__construct();
      //  exit();
        $this->load->model(array('mytreasure_model'));
    }

    public function stats() {
        $this->data['registeredUsers'] = $this->pirate_model->get_all();
        $this->data['mytreasures'] = $this->mytreasure_model->get_treasure_per_user();
        $this->template->write_view('content', 'views/admin/pirates/stats', $this->data);
        $this->template->render();
    }    
}
?>
