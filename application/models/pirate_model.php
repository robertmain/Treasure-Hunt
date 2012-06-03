<?php

class Pirate_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->before_delete = array('delete_found');
        //$this->after_get = array('resolve_timestamp');
    }

    public function delete_found($id) {
        $this->db->delete('found', array('pirate' => $id));
    }

    public function resolve_timestamp($row) {
        $row->signup = DateTime::createFromFormat('U', $row->signup);
    }

    public function getSignupAnalytics() {
        $this->db->select('COUNT(id) as "signups", MINUTE(FROM_UNIXTIME(signup)) as "minute", HOUR(FROM_UNIXTIME(signup)) as "hour", DAY(FROM_UNIXTIME(signup)) as "day", forename, surname, id');
        $this->db->from('pirates');
        $this->db->group_by("hour");
        $this->db->where('admin', '0');
        $this->db->order_by('signup', 'ASC');
        $analytics = array();
        foreach ($this->db->get()->result() as $Analytic) {
            unset($Analytic->day, $Analytic->pirate);
            $analytics[] = $Analytic;
        }
        return $analytics;
    }

}