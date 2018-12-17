<?php

namespace App;

class AssetType extends Model
{
    public function assets() {
		return $this->hasMany(Asset::class);
	}
}
