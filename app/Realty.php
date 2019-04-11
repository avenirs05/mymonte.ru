<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realty extends Model
{
    protected $table = 'realties';
	
	public function images() 
	{
		return $this->hasMany('App\Image');
	}
	
	public function feedbacks() 
	{
		return $this->hasMany('App\Feedback');
	}

}
