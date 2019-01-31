<?php

namespace App;

class Company extends Model
{
	public function scopeActive($query) {
    	return $query->where('status_id',1);
	}
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
	public function tasks() {
		return $this->hasMany(Task::class);
	}
	public function images() {
		return $this->hasMany(Image::class);
	}
	public function files() {
		return $this->hasMany(File::class);
	}
}