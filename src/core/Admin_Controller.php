<?php

namespace App\Core;

use App\Core\Controller;

// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isAdmin()) {
            redirect('admin/login');
        }
    }
}
