<?php

namespace App\Http\Uploads;

use Intervention\Image\Facades\Image;

trait HandleImageUploads
{
    public function resizeAndSave($uploadedImage, $folder, $width = null, $height = null)
    {
        $ext = $uploadedImage->getClientOriginalExtension(); //png, jpeg,..
        $name = sha1_file($uploadedImage); // crée un hash à partir d'un fichier


        $image = Image::make($uploadedImage);
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save('img/'. $folder .'/' . $name . '.' . $ext);

        return asset('img/'. $folder .'/') . '/' . $name . '.' . $ext; // ou prendre tout le nom du path
    }
}
