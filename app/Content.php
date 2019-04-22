<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

	protected $guarded = [];
	
	
	public function language() 
	{
		return $this->belongsTo('App\Language');
	}

}
