<?php

namespace App\Traits;

trait UploadFile
{
    public function Upload($imageFile, $path){
        $imgExt = $imageFile->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $imageFile->move($path, $fileName);
        return $fileName;

    }
}
