<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slide";
    public function product(){
    	return $this->hasMany('App/Product','id_type', 'id');
    }
}
