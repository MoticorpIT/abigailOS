<?php

namespace App;

class Company extends Model
{
    public function status() {
		return $this->belongsTo(Status::class);
	}
	public function CompanyType() {
		return $this->belongsTo(CompanyType::class, 'company_type_id');
	}
	public function assets() {
		return $this->hasMany(Asset::class);
	}
	public function accounts() {
		return $this->hasMany(Account::class);
	}
	public function notes() {
		return $this->hasMany(Note::class);
	}
}