<?php

namespace App;

class Account extends Model
{
	public function scopeActive($query) {
    	return $query->where('status_id',1);
	}
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
	public function tasks() {
		return $this->hasMany(Task::class);
	}
	public function images() {
		return $this->hasMany(Image::class);
	}
	public function files() {
		return $this->hasMany(File::class);
	}
}
