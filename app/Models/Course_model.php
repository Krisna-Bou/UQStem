<?php

namespace App\Models;

use CodeIgniter\Model;

class Course_model extends Model
{
    protected $useAutoIncrement = true;

    public function enroll($uid,$cid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('courses');
        $data = [
            'uid' => $uid,
            'cid' => $cid,
        ];
        return $builder->insert($data);
    }

    public function get_courses($uid)
    {
        $db = \Config\Database::connect();
        $data = $db->table('courses')->select('cid')->where('uid',$uid)->get()->getResultArray();
        return $data;
    }
}
