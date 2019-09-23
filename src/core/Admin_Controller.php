<?php

namespace App\Core;

use App\Core\Controller;

class Admin_Controller extends Controller {

    public function __construct() {
        parent::__construct();
        if(!isAdmin()){
            redirect('admin/login');
        }
    }

}
