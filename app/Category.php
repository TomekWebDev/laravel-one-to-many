<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    //questa funzione esprime la relazione con la tabella posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
