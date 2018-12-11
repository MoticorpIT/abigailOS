<?php

namespace App;

class AccountType extends Model
{
    public function accounts() {
		return $this->hasMany(Account::class);
	}
}
