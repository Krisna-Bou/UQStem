<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function index()
    {
        
        $model = model('App\Models\User_model');
        $session = session();
        $username = $session->get('username');
        $data = $model->get_user($username);
        foreach ($data as $row) {
            $session->set('uid',$row['uid']);
            $session->set('email',$row['email']);
            $session->set('profilepic','/assignment/writable/uploads/'.$row['filename']);
        }
        $model = model('App\Models\Course_model');
        $data = $model->get_courses($session->get('uid'));
        $d = [
            'cid' => $data,
        ];
        echo view("template/header");
        echo view("account",$d);
        echo view("template/footer");
    }

    public function get_favourites()
    {
        $session = session();
        $model = model('App\Models\Favourite_model');
        $data = $model->get_favourites($session->get('uid'));
        $d = [
            'fid' => $data,
        ];
        echo view("favourites",$d);
    }


    public function update_email(){
        $session = session();
        $email = $this->request->getPost('email');
        $uid = $session->get('uid');
        $model = model('App\Models\User_model');
        $model->update_email($uid,$email);
        return redirect()->to(base_url('/account'));
    }

    public function add_course(){
        $session = session();
        $cid = $this->request->getPost('course');
        $uid = $session->get('uid');
        $model = model('App\Models\Course_model');
        $model->enroll($uid,$cid);
        return redirect()->to(base_url('/account'));
    }

    public function upload_file() {
        $file = $this->request->getFile('userfile');
        $file->move(WRITEPATH . 'uploads');
        $filename = $file->getName();
        $uid = $session->get('uid');
        $model = model('App\Models\User_model');
        $model->upload($uid, $filename);
        return redirect()->to(base_url('/account'));
    }

    public function getAJAXResult()
    {    
        return redirect()->to(base_url('account/favourites'));      
    }
}