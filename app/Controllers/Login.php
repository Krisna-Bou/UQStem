<?php
namespace App\Controllers;

class Login extends BaseController
{

    
    public function index()
    {
        // check whether the cookie is set or not, if set redirect to welcome page, if not set, check the session
        $model = model('App\Models\Post_model');
        $data = $model->get_course_posts('CSSE2310');
        echo view('template/header');
        $d = [
            'pid' => $data,
        ];
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            echo view("template/header");
            echo view("template/course_head");
            echo view("home",$d);
            echo view("template/footer");
        }
        else {
            $session = session();
            $username = $session->get('username');
            $password = $session->get('password');
            if ($username && $password) {
                echo view("template/header");
                echo view("template/course_head");
                echo view("home",$d);
                echo view("template/footer");
            } else {
                $data['error'] = "";
                echo view('login', $data);
                echo view('template/footer');
            }
        }
    }

    public function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    public function check_secret() {
        $email = $this->request->getPost('email');
        $a1 = $this->request->getPost('a1');
        $a2 = $this->request->getPost('a2');
        $new = $this->request->getPost('new');
        $password = $this->hash_password($new);
        $model = model('App\Models\User_model');
        $check = $model->secrets($email,$a2,$a2);
        if ($check) {
            $model->update_pass($email,$password);
            # Create a session 
            $session = session();
            $session->set('password', $password);
            $session->set('email', $email);
            $data = $model->get_username($email, $password);
            foreach ($data as $row) {
                $session->set('username', $row['username']);
                $session->set('uid',$row['uid']);
            }
            return redirect()->to(base_url());
        } else {
            echo view('template/header');
            echo view('secret_questions');
            echo view('template/footer');
        }
    }

    public function check_login()
    {
        $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $model = model('App\Models\User_model');
        $check = $model->login($username, $password);
        $if_remember = $this->request->getPost('remember');
        if ($check) {
            # Create a session 
            $session = session();
            $session->set('username', $username);
            $session->set('password', $password);
            $data = $model->get_user($username, $password);


            
            foreach ($data as $row) {
                $session->set('uid',$row['uid']);
                $session->set('email',$row['email']);
            }
            if ($if_remember) {
                # Create a cookie
                setcookie('username', $username, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            }
            //echo view('notification');
            return redirect()->to(base_url());
        } else {
            echo view('template/header');
            echo view('login', $data);
            echo view('template/footer');
        }
    }

    public function forgot_pass()
    {
        echo view('template/header');
        echo view('secret_questions');
        echo view('template/footer');
    }

    public function logout()
    {
        helper('cookie');
        $session = session();
        $session->destroy();
        //destroy the cookie
        setcookie('username', '', time() - 3600, "/");
        setcookie('password', '', time() - 3600, "/");
        return redirect()->to(base_url('login'));
    }
}

