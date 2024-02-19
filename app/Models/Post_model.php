<?php

namespace App\Models;

use CodeIgniter\Model;

class Post_model extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'pid';
    protected $useAutoIncrement = true;

    public function get_course_posts($cid) {
        $db = \Config\Database::connect();
        $posts = $db->table('posts')->where('cid',$cid)->get()->getResultArray();
        return $posts;
    }

    public function get_post($pid) {
        $db = \Config\Database::connect();
        $post = $db->table('posts')->where('pid',$pid)->get()->getResultArray();
        return $post;
    }


    public function get_image($pid) {
        $db = \Config\Database::connect();
        $post = $db->table('images')->where('pid',$pid)->get()->getResultArray();
        return $post;
    }


    public function get_replies($pid) {
        $db = \Config\Database::connect();
        $replies = $db->table('replies')->where('pid',$pid)->get()->getResultArray();
        return $replies;
    }

    public function upload($pid, $image)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('images');
        $data = [
            'pid' => $pid,
            'image' => $image,
        ];
        if ($this->get_image($pid)) {
            $builder->where('pid',$pid);
            return $builder->update($data);
        } else {
            return $builder->insert($data);
        }
    }

    public function new_post($title, $body, $date,$username,$cid)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('posts');
        $data = [
            'title' => $title,
            'body' => $body,
            'date' => $date,
            'username' => $username,
            'cid' => $cid,
        ];
        return $builder->insert($data);
    }
}
