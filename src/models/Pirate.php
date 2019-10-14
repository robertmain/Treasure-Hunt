<?php

namespace App\Models;

use App\Core\Model;

class Pirate extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->before_delete = ['deleteFound'];
    }

    public function deleteFound($id)
    {
        $this->db->delete('found', ['pirate' => $id]);
    }

    public function getSignupAnalytics()
    {
        $this->db->select('
            COUNT(id) as "signups",
            MINUTE(created_at) as "minute",
            HOUR(created_at) as "hour",
            DAY(created_at) as "day",
            forename,
            surname,
            id')
            ->from('pirates')
            ->group_by('hour')
            ->where('admin', '0')
            ->order_by('created_at', 'ASC');

        return array_map(function ($Analytic) {
            unset($Analytic->day, $Analytic->pirate);
            return $Analytic;
        }, $this->db->get()->result());
    }
}
