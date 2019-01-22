<?php

namespace App;

class Invoice extends Model
{
    public function payments() {
		return $this->hasMany(Payment::class);
	}
}
