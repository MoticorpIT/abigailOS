<?php

namespace App;

class Payment extends Model
{
    public function invoice() {
		return $this->belongsTo(Invoice::class);
	}
}
