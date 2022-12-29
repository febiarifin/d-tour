<?php

namespace App\Helpers;

class ImageHelper{


    public function upload($image, $path)
    {
        if ($image) {
            $imagePath = $image->store($path, 'public');
            return $imagePath;
        }
    }

    public function delete($image)
    {
        if ($image) {
            if (file_exists(public_path($image))) {
                unlink(public_path($image));
            }
        }
    }

    public static function instance(){
        return new ImageHelper();
    }

}
