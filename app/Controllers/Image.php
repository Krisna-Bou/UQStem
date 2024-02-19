<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ImageModel;
use CodeIgniter\Files\File;

class Image extends Controller
{
    public function index()
    {
        helper(['form', 'url']);
        return view('image_form');
    }

    public function upload_picture()
    {
        helper(['form', 'url']);
        
        $rules = [
            'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png,gif]',
        ];
        $session = session();
        $image = $this->request->getFile('image');

        $image->move(WRITEPATH . 'uploads');
        $filename = $image->getName();
        $model = model('App\Models\Image_model');
        $newname = $model->resize(ROOTPATH.'/writable/uploads/',$filename,250,250);    
        
        $uid = $session->get('uid');
        $model = model('App\Models\User_model');
        $model->upload($uid, $newname);
        $session = session();
        $session->set('profilepic','/assignment/writable/uploads/'.$newname);
        return redirect()->to(base_url('/account'));
    }
}