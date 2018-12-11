<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function company() {
		return $this->belongsTo(Company::class);
	}
	public function asset() {
		return $this->belongsTo(Asset::class);
	}
	public function status() {
		return $this->belongsTo(Status::class);
	}
	public function AccountType() {
		return $this->belongsTo(AccountType::class, 'account_type_id');
	}
	public function notes() {
		return $this->hasMany(Note::class);
	}
}
