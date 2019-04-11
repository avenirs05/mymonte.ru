<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
	public function realty() 
	{
		return $this->belongsTo('App\Realty');
	}
}
