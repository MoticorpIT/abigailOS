<?php

namespace App;

class Tenant extends Model
{
    public function status() {
		return $this->belongsTo(Status::class);
	}
	public function accountStanding() {
		return $this->belongsTo(AccountStanding::class);
	}
	public function contracts() {
		return $this->hasMany(Contract::class);
	}
}
