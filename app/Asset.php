<?php

namespace App;

class Asset extends Model
{
	public function scopeActive($query) {
    	return $query->where('status_id',1);
	}
    public function company() {
		return $this->belongsTo(Company::class);
	}
	public function accounts() {
		return $this->hasMany(Account::class);
	}
	public function AssetType() {
		return $this->belongsTo(AssetType::class, 'asset_type_id');
	}
	public function status() {
		return $this->belongsTo(Status::class);
	}
	public function contracts() {
		return $this->belongsTo(Contract::class);
	}
	public function notes() {
		return $this->hasMany(Note::class);
	}
	public function tasks() {
		return $this->hasMany(Task::class);
	}
	public function files() {
		return $this->hasMany(File::class);
	}
}
