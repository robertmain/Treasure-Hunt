<?php

namespace App\Models;

use App\Core\Model;

class Mytreasure extends Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'found';
        $this->load->model(array('Treasure', 'Pirate'));
        $this->after_get = [
            'format_record_metadata',
            'get_treasure',
            'get_pirate'
        ];
    }

    public function get_treasure($row) {
        if($row){
            $row->treasure = $this->Treasure->get($row->treasure);
        }
        return $row;
    }

    public function get_pirate($row) {
        if($row){
            $row->pirate = $this->Pirate->get($row->pirate);
        }
        return $row;
    }

    public function get_treasure_per_user() {
        $this->db->select('pirates.phone,pirates.signup,count(found.id) as treasures, pirates.id as p_id');
        $this->db->from('pirates');
        $this->db->join('found', 'found.pirate = pirates.id', 'left');
        $this->db->where('pirates.admin', '0');
        $this->db->group_by("pirates.id");
        return $this->db->get()->result();
    }

    public function get_all_found() {
        $this->db->select('found.id as f_id, found.treasure, treasure.title, pirates.phone');
        $this->db->from('found');
        $this->db->join('pirates', 'pirates.id = found.pirate');
        $this->db->join('treasure', 'treasure.id = found.treasure');
        $this->db->order_by('found.time');
        $results = array();
        foreach ($this->db->get()->result() as $Found) {
            $Found->phone = md5(PIRATESALT . $Found->phone);
            $results[] = $Found;
        }
        return $results;
    }

    public function get_new_found($id) {
        $this->db->select('found.id as f_id, found.treasure, treasure.title, pirates.phone');
        $this->db->from('found');
        $this->db->where('found.id >', $id);
        $this->db->join('pirates', 'pirates.id = found.pirate');
        $this->db->join('treasure', 'treasure.id = found.treasure');
        $this->db->order_by('found.time');
        $results = array();
        foreach ($this->db->get()->result() as $Found) {
            $Found->phone = md5(PIRATESALT . $Found->phone);
            $results[] = $Found;
        }
        return $results;
    }

    public function strip_treasure($pirateID) {
        $this->db->where('pirate', $pirateID);
        return $this->db->delete($this->_table);
    }

    public function getTreasureFoundAnalytics() {
        $this->db->select('COUNT(treasure) as "treasure_found", MINUTE(FROM_UNIXTIME(time)) as "minute", HOUR(FROM_UNIXTIME(time)) as "hour", DAY(FROM_UNIXTIME(time)) as day, time,found.pirate');
        $this->db->from('found');
        $this->db->join('pirates', 'pirates.id = found.pirate', 'LEFT');
        $this->db->join('treasure', 'treasure.id = found.treasure', 'LEFT');
        $this->db->group_by("minute");
        $this->db->order_by('time', 'ASC');
        $analytics = array();
        foreach ($this->db->get()->result() as $Analytic) {
            unset($Analytic->day, $Analytic->pirate);
            $analytics[] = $Analytic;
        }
        return $analytics;
    }

    public function treasure_per_pirate(){
        return $this->db->query('SELECT AVG(temp.pirate_treasure) FROM (SELECT count(id) as pirate_treasure FROM `found` GROUP BY pirate) as temp')->result();

    }

}
