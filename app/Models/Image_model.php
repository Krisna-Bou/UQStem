<?php namespace App\Models;
use CodeIgniter\Model;

class ImageModel extends Model {

    protected $allowedFields = ['filename', 'path'];

    // Crop image
    public function crop($path, $filename) {
        echo $path, $filename;
        $imagick = new \Imagick($path.$filename);
        $width = $imagick->getImageWidth();
        $height = $imagick->getImageHeight();
        $imagick->cropImage($width/2, $height/2, $width/4, $height/4);
        $imagick->writeImage($path.'crop_'.$filename);
        $imagick->clear();
        $imagick->destroy();
        return 'crop_'.$filename;
    }

    // Resize image
    public function resize($path,$filename, $width, $height) {
        $imagick = new \Imagick($path.$filename);
        $imagick-> resizeImage($width,$height, 1,1);
        $imagick->writeImage($path.'resize_'.$filename);
        $imagick->clear();
        $imagick->destroy();
        return 'resize_'.$filename;
    }
}
