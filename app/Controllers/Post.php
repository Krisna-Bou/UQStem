<?php
namespace App\Controllers;

class Post extends BaseController {
    public function csse2310(){
        $model = model('App\Models\Post_model');
        $data = $model->get_course_posts('CSSE2310');
        echo view('template/header');
        $d = [
            'pid' => $data,
        ];
        echo view("template/course_head");
        echo view('home', $d);
        echo view('template/footer');
    }

    public function infs3202(){
        $model = model('App\Models\Post_model');
        $data = $model->get_course_posts('INFS3202');
        echo view('template/header');
        $d = [
            'pid' => $data,
        ];
        echo view("template/course_head");
        echo view('home', $d);
        echo view('template/footer');
    }

    public function engg4900(){
        $model = model('App\Models\Post_model');
        $data = $model->get_course_posts('ENGG4900');
        echo view('template/header');
        $d = [
            'pid' => $data,
        ];
        echo view("template/course_head");
        echo view('home', $d);
        echo view('template/footer');
    }

    public function upload_image(){
        $file = $this->request->getFile('file');
        $file->move(WRITEPATH . 'uploads');
        $filename = $file->getName();
        $model = model('App\Models\Post_model');
        $session = session();
        $model->upload($session->get('pid'), $filename);
    }


    public function view_post($pid){
        $session = session();
        if (session()->get('username')) { 
            $model = model('App\Models\User_model');
            $x = $model->get_user($session->get('username'));
            $uid = $x[0]['uid'];

            $model = model('App\Models\Favourite_model');
            if ($model->check_favourite($pid,$uid)) {
                $session->set('fav', true);
            } else {
                $session->set('fav', false);
            }
        }
        $model = model('App\Models\Post_model');

        if ($data = $model->get_image($pid)) {
            $session->set('postpic','/assignment/writable/uploads/'.$data[0]['image']);
        } else {
            $session->set('postpic','');
        }

        $data = $model->get_post($pid);
        $session->set('title', $data[0]['title']);
        $session->set('cid', $data[0]['cid']);
        $session->set('pid', $data[0]['pid']);
        $session->set('date', $data[0]['date']);
        $session->set('body', $data[0]['body']);

        $data = $model->get_replies($pid);
        $d = [
            'rid' => $data,
        ];
        echo view('template/header');
        echo view("template/course_head");
        echo view('post', $d);
        echo view('template/footer');
    }

    public function make_comment() {
        $model = model('App\Models\Comment_model');
        $session = session();
        $username = $session->get('username');
        $pid = $session->get('pid');
        $date = date("Y-m-d");
        $rbody = $this->request->getPost('comment');
        $model->new_comment($pid, $date,$username,$rbody);
        return redirect()->to(base_url('/post/'.$pid));
    }

    public function favourite() {
        $model = model('App\Models\Favourite_model');
        $session = session();
        $pid = $session->get('pid');
        $model->favourite($pid);
        return redirect()->to(base_url('/post/'.$pid));
    }

    public function unfavourite() {
        $model = model('App\Models\Favourite_model');
        $session = session();
        $pid = $session->get('pid');
        $model->unfavourite($pid);
        return redirect()->to(base_url('/post/'.$pid));
    }
}

