<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountStanding extends Model
{
    public function tenants() {
		return $this->hasMany(Tenant::class);
	}
}
