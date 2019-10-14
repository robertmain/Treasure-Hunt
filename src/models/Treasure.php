<?php

namespace App\Models;

use App\Core\Model;

class Treasure extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'treasure';
        $this->before_delete = ['deleteFound'];
    }

    public function deleteFound($id)
    {
        $this->db->delete('found', ['treasure' => $id]);
    }

    public function getAllAndLast()
    {
        $query='SELECT * FROM
            (SELECT
                treasure.title,
                found.pirate,
                treasure.location,
                treasure.clue,
                treasure.id AS treasure_id,
                found.id AS found_id,
                treasure.text,
                treasure.md5,
                treasure.deleted_at
            FROM
                treasure
            LEFT JOIN found ON found.treasure = treasure.id
            ORDER BY found.' . Mytreasure::CREATED . ' DESC) AS temp_table
                LEFT JOIN
            pirates ON pirates.id = temp_table.pirate
        WHERE temp_table.deleted_at IS NULL
        GROUP BY temp_table.treasure_id';

        return $this->db->query($query)->result();
    }
}
