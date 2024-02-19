<?php
namespace App\Controllers;

use CodeIgniter\Email\Email;

class Email_Controller extends BaseController
{

    
    public function index()
    {
        // check whether the cookie is set or not, if set redirect to welcome page, if not set, check the session
        helper(['form']);
        $session = session();
        $code = rand(0,9999);
        $session->set('code',$code);
        $this->send($code);
        echo view('template/header');
        echo view('verify');
        echo view('template/footer');
    }

    public function verify(){
        $usercode = $this->request->getPost('user_code');
        $session = session();
        $code = $session->get('code');
        if ($code == $usercode) {
            return redirect()->to(base_url());
        } else {
            echo "ERROR - WRONG CODE";
            $this->index();
        }
    }

    public function send($code) {
        helper(['form']);
        $session = session();
        $receiver = $session->get('email');
        $sender = 'k.bou@uqconnect.edu.au';
        $subject = 'Verification Code';
        $message = $code;
        $email = new Email();

        $emailConf = [
            'protocol' => 'smtp',
            'wordWrap' => true,
            'SMTPHost' => 'mailhub.eait.uq.edu.au',
            'SMTPPort' => 25
        ];

        $email->initialize($emailConf);
        $email->setTo($receiver);
        $email->setFrom($sender);
        $email->setSubject($subject);
        $email->setMessage($message);
        $email->send();
    }
}

