<?php

namespace App;

class Contract extends Model
{
	public function scopeNotEnded($query) {
    	return $query->where('term_ended', '!=', '');
	}
    public function asset() {
		return $this->belongsTo(Asset::class);
	}
	public function tenant() {
		return $this->belongsTo(Tenant::class);
	}
	public function invoices() {
		return $this->hasMany(Invoice::class);
	}
}
