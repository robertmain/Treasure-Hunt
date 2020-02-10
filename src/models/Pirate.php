<?php

namespace App\Models;

use App\Core\Model;
use ProbablyRational\RandomNameGenerator\All;
use ProbablyRational\RandomNameGenerator\Alliteration;

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

    /**
     * @inheritdoc
     */
    public function save($data, $id = null)
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = $this->password_hash($data['password']);
        }

        if ($id === null) {
            $data['nickname'] = (new All([
                new Alliteration(),
            ]))->getName();
        }

        return parent::save($data, $id);
    }

    public function password_verify($phone, $password)
    {
        $user = $this->get_by(['phone' => $phone]);
        if ($user) {
            return $this->password_hash($password) == $user->password;
        } else {
            return false;
        }
    }

    protected function password_hash($password)
    {
        return hash('sha512', $password);
    }
}
