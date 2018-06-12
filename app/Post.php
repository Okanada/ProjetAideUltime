<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


//La class Post ici est une convention de nommage pour lier ce model ci à la table qui lui est liée
class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
