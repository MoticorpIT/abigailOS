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
	public function account() {
		return $this->belongsTo(Account::class);
	}
	public function asset() {
		return $this->belongsTo(Asset::class);
	}
}
