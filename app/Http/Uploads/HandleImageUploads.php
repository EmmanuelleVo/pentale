<?php

namespace App\Http\Uploads;

use Intervention\Image\Facades\Image;

trait HandleImageUploads
{
    public function resizeAndSave($uploadedImage)
    {
        $ext = $uploadedImage->getClientOriginalExtension();
        $name = sha1_file($uploadedImage); // crée un hash à partir d'un fichier

        $image = Image::make($uploadedImage);
        $image->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save('images/avatars/' . $name . '.' . $ext);

        return asset('images/avatars/') . '/' . $name . '.' . $ext; // ou prendre tout le nom du path
    }
}
