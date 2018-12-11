<?php

namespace App;

class CompanyType extends Model
{
    public function companies() {
		return $this->hasMany(Company::class);
	}
}
