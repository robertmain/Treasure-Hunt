<?php

namespace App\Core;

use App\Core\Controller;
use Exceptions\Http\Client\ForbiddenException;

// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isAdmin()) {
            throw new ForbiddenException();
        }
    }
}
