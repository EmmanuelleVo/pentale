<?php

namespace App\Http\Uploads;

use Intervention\Image\Facades\Image;

trait HandleImageUploads
{
    public function resizeAndSave($uploadedImage, $folder, $width = null, $height = null)
    {
        // dd(storage_path() . '/img/covers/' .$this->model->cover);
        // $path = $request->file('avatar')->store('avatars');

        $ext = $uploadedImage->getClientOriginalExtension(); //png, jpeg,..
        $name = sha1_file($uploadedImage); // crée un hash à partir d'un fichier

        $image = Image::make($uploadedImage);
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image_name = $name . '.' .$ext;

        $image->save('img/'. $folder .'/' . $name . '.' . $ext);

        return asset('img/'. $folder .'/') . '/' . $image_name; // ou $name . '.' . $ext sans le asset()
    }
}
