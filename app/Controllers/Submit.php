<?php

namespace App\Controllers;

class Submit extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('submit');
        echo view('template/footer');
    }

    public function check_submit(){
        $session = session();
        $title = $this->request->getPost('title');
        $body = $this->request->getPost('body');
        $cid = $this->request->getPost('cid');
        $image = $this->request->getPost('image');
        $date = date("Y/m/d");
        $username = $session->get('username');

        $model = model('App\Models\Post_model');

        $check = $model->new_post($title, $body, $date,$username,$cid);

        if ($check) {
            return redirect()->to(base_url(''));
        } else {
            echo view('template/header');
            echo view('submit');
            echo view('template/footer');
        }
    }
}

