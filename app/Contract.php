<?php

namespace App;

class Contract extends Model
{
	// Datefields to be Mutated to Carbon Instances
	protected $dates = [
        'term_start'
    ];
    
	public function scopeNotEnded($query) {
    	return $query->where('term_ended', null);
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
