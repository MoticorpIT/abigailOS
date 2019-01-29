<?php

namespace App;

class Invoice extends Model
{
    public function payments() {
		return $this->hasMany(Payment::class);
	}
	public function contract() {
		return $this->belongsTo(Contract::class);
	}
	public function priority() {
		return $this->belongsTo(Priority::class);
	}
	public function status() {
		return $this->belongsTo(Status::class);
	}
}
