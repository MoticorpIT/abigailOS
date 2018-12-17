<?php

namespace App;

class Contract extends Model
{
    public function asset() {
		return $this->belongsTo(Asset::class);
	}
	public function tenant() {
		return $this->belongsTo(Tenant::class);
	}
}
