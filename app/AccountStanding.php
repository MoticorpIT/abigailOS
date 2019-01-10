<?php

namespace App;

class AccountStanding extends Model
{
    public function tenants() {
		return $this->hasMany(Tenant::class);
	}
}
