<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        $data['error'] = "";
        echo view('template/header');
        echo view('register', $data);
        echo view('template/footer');
    }
    
    public function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }



    public function check_register()
    {
        $error['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Sorry, the username and email must be unique, and the password must be greater than 8 </div> ";
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $s1 = $this->request->getPost('s1');
        $s2 = $this->request->getPost('s2');
        $password = $this->request->getPost('password');
        $new_pass = $this->hash_password($password);
        $model = model('App\Models\User_model');


        $validationRules = [
            'username' => 'required|alpha_numeric_space|is_unique[users.username]',
            'email' => 'required|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];
        if ($this->validate($validationRules)) {
            $model->new_user($email, $username, $new_pass,$s1,$s2);
            # Create a session 
            $session = session();
            $session->set('username', $username);
            $session->set('password', $new_pass);
            $data = $model->get_user($username, $password);
            foreach ($data as $row) {
                $session->set('uid',$row['uid']);
                $session->set('email',$row['email']);
            }
            return redirect()->to(base_url().'email');
        } else {
            echo view('template/header');
            echo view('register', $error);
            echo view('template/footer');
        }
    }
}

