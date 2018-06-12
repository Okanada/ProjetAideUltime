<?php

namespace App\Services;

use Image;//<- appel de l'alias que l'on a créer dans "app.php"
use Storage;


class imageResize {

    public function imageStore($image){  //<-paramètre que l'on créer pour l'utiliser dans une variable (imageRed) qui va permettre de stocker l'image initiale dans le store
        
        $imageRed = $image->store('','imagePost');  //<-
        $image->store('','imagePostResize');

        $imgResize = Image::make(Storage::disk('imagePostResize')->path($imageRed))->resize(300, null,function         ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });

        $imgResize->save();


    // Faire une return de l'appel de mon image
        return $imageRed;

    }


    public function imageDelete($imageName){   //<- paramètre que l'on choisit pour delete l'image initiale et l'image redimmensionnée 

         Storage::disk('imagePost')->delete($imageName);
        Storage::disk('imagePostResize')->delete($imageName);


    }



}