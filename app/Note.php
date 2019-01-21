<?php

namespace App;

class Note extends Model
{
	public function scopeActive($query) {
    	return $query->where('status_id',1);
	}
	public function scopeOrdered($query) {
    	return $query->orderBy('updated_at', 'desc');
	}
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
