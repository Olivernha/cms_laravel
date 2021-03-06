<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uploads='/images/';
    protected $fillable=['file'];

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
    public function photoPlaceholder(){
        return "http://placehold.it/200x700";
    }
}
