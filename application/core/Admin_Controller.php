<?php

class Admin_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if(!isAdmin()){
            redirect('admin/login');
        }
    }

}