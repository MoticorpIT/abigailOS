<?php

namespace App;

class Status extends Model
{
    public function companies() {
		return $this->hasMany(Company::class);
	}
	public function accounts() {
		return $this->hasMany(Account::class);
	}
	public function assets() {
		return $this->hasMany(Asset::class);
	}
	public function tenants() {
		return $this->hasMany(Tenant::class);
	}
}
