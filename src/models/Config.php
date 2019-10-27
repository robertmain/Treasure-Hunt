<?php

namespace App\Models;

use App\Core\Model;

class Config extends Model
{
    const PRIMARY_KEY = 'key';

    public function __construct()
    {
        parent::__construct();
        $this->table = 'config';
    }
}
