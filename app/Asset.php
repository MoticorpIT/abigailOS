<?php

namespace App;

class Asset extends Model
{
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
}
