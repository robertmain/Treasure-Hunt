<?php

namespace App\Models;

use App\Core\Model;

class Mytreasure extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'found';
        $this->load->model(['Treasure', 'Pirate']);
        $this->after_get = [
            'formatRecordMetadata',
            'getTreasure',
            'getPirate'
        ];
    }

    public function getTreasure($row)
    {
        if ($row) {
            $row->treasure = $this->Treasure->get($row->treasure);
        }
        return $row;
    }

    public function getPirate($row)
    {
        if ($row) {
            $row->pirate = $this->Pirate->get($row->pirate);
        }
        return $row;
    }

    public function getTreasurePerUser()
    {
        $this->db->select('pirates.phone,
            count(found.id) as treasures,
            pirates.' . Pirate::CREATED . ',
            pirates.id as p_id')
            ->from('pirates')
            ->join('found', 'found.pirate = pirates.id AND found.deleted_at IS NULL', 'left')
            ->where('pirates.admin', false)
            ->group_by("pirates.id");
        return $this->db->get()->result();
    }

    public function getAllFound()
    {
        $this->db->select('found.id as f_id, found.treasure, treasure.title, pirates.phone');
        $this->db->from($this->table);
        $this->db->join('pirates', 'pirates.id = found.pirate');
        $this->db->join('treasure', 'treasure.id = found.treasure');
        $this->db->order_by($this->table . '.' . self::CREATED);
        return array_map(function ($found) {
            $found->phone = md5(PIRATESALT . $found->phone);
            return $found;
        }, $this->db->get()->result());
    }

    public function getNewFound($id)
    {
        $this->db->select('found.id as f_id, found.treasure, treasure.title, pirates.phone');
        $this->db->from($this->table);
        $this->db->where('found.id >', $id);
        $this->db->join('pirates', 'pirates.id = found.pirate');
        $this->db->join('treasure', 'treasure.id = found.treasure');
        $this->db->order_by($this->table . '.' . self::CREATED);
        return array_map(function ($found) {
            $found->phone = md5(PIRATESALT, $found->phone);
            return $found;
        }, $this->db->get()->result());
    }

    public function stripTreasure($pirateID)
    {
        $this->db->set(self::DELETED, date(MYSQL_DATETIME))
            ->where('pirate', $pirateID);
        return $this->db->update($this->table);
    }

    public function getTreasureFoundAnalytics()
    {
        $this->db->select('
            COUNT(treasure) as "treasure_found",
            ' . $this->table . '.' . self::CREATED . ',
            found.pirate');
        $this->db->from($this->table);
        $this->db->join('pirates', 'pirates.id = found.pirate', 'LEFT');
        $this->db->join('treasure', 'treasure.id = found.treasure', 'LEFT');
        $this->db->order_by($this->table . '.' . self::CREATED, 'ASC');
        $analytics = array_map(function ($record) {
            unset($record->day);
            unset($record->pirate);
            return $record;
        }, $this->db->get()->result());

        return $analytics;
    }

    public function treasurePerPirate()
    {
        return $this->db->query('SELECT
        AVG(temp.pirate_treasure) FROM (
            SELECT count(id) as pirate_treasure FROM `found` GROUP BY pirate
        ) as temp')->result();
    }
}
