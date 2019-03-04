<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Asset extends Model implements HasMedia
{
	use HasMediaTrait;
	
	// SCOPES
	public function scopeActive($query) {
    	return $query->where('status_id',1);
	}
	// SCOPES - END

	// MEDIA/IMAGES - START
	public function registerMediaCollections()
	{
		$this->addMediaCollection('assets')
			->registerMediaConversions(function (Media $media = null) {
				$this->addMediaConversion('main')
					->width(985)
					->height(616)
					->withResponsiveImages();
				$this->addMediaConversion('profile')
					->width(350)
					->height(350)
					->withResponsiveImages();
				$this->addMediaConversion('thumb')
					->width(194)
					->height(121)
					->withResponsiveImages();
			});
	}
	// MEDIA/IMAGES - END

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
