<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('template/header');
        echo view('template/course_head');
        echo view('home');
        echo view('template/footer');
    }
}
