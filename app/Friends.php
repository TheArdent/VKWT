<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
	public function users(){
		return $this->belongsToMany('App\Users','user_id');
	}

	public function user(){
		return $this->belongsTo('App\Users', 'friend_id')->first();
	}
}
