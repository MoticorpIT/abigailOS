<?php

namespace App;

class Note extends Model
{
    public function company() {
		return $this->belongsTo(Company::class);
	}
	public function user() {
		return $this->belongsTo(User::class);
	}
}
