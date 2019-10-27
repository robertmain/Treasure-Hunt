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
            ' . $this->table . '.' . self::CREATED . ',
            forename,
            surname,
            id')
            ->from('pirates')
            ->where('admin', false)
            ->order_by($this->table . '.' . self::CREATED, 'ASC');

        return array_map(function ($Analytic) {
            unset($Analytic->day, $Analytic->pirate);
            return $Analytic;
        }, $this->db->get()->result());
    }
}
