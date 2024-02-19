<?php

namespace App\Models;

use CodeIgniter\Model;

class Comment_model extends Model
{
    public function new_comment($pid, $date,$username,$rbody)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('replies');
        $data = [
            'pid' => $pid,
            'date' => $date,
            'username' => $username,
            'rbody' => $rbody,
        ];
        return $builder->insert($data);
    }
}
