<?php

namespace App;

class Asset extends Model
{
    public function companies() {
		return $this->belongsTo(Company::class);
	}
	public function accounts() {
		return $this->hasMany(Account::class);
	}
}
