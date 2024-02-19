<?php

namespace App\Models;

use CodeIgniter\Model;

class Favourite_model extends Model
{
    public function favourite($pid)
    {
        $db = \Config\Database::connect();
        $session = session();
        $builder = $db->table('favourites');
        $data = [
            'pid' => $pid,
            'uid' => $session->get('uid'),
        ];
        return $builder->insert($data);
    }

    public function unfavourite($pid)
    {
        $db = \Config\Database::connect();
        $session = session();
        $builder = $db->table('favourites');
        $data = [
            'pid' => $pid,
            'uid' => $session->get('uid'),
        ];
        return $builder->delete($data);
    }

    public function check_favourite($pid,$uid)
    {
        $db = \Config\Database::connect();
        $result = $db->table('favourites')->where('uid',$uid)->where('pid',$pid)->get()->getResultArray();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_favourites($uid)
    {
        $db = \Config\Database::connect();
        $result = $db->table('favourites')->where('uid',$uid)->get()->getResultArray();
        return $result;
    }

}
