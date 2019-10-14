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
            MINUTE(FROM_UNIXTIME(signup)) as "minute",
            HOUR(FROM_UNIXTIME(signup)) as "hour",
            DAY(FROM_UNIXTIME(signup)) as "day",
            forename,
            surname,
            id')
            ->from('pirates')
            ->group_by('hour')
            ->where('admin', '0')
            ->order_by('signup', 'ASC');

        return array_map(function ($Analytic) {
            unset($Analytic->day, $Analytic->pirate);
            return $Analytic;
        }, $this->db->get()->result());
    }
}
