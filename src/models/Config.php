<?php

namespace App\Models;

use App\Core\Model;

class Config extends Model {

    public function __construct() {
        parent::__construct();
        $this->primary_key = 'key';
        $this->table = 'config';
    }

}
