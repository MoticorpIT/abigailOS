<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Tenant extends Model implements HasMedia
{
	use HasMediaTrait;

	// IMAGE - START
	public function registerMediaCollections()
	{
		$this->addMediaCollection('tenants')
			->singleFile()
			->registerMediaConversions(function (Media $media = null) {
				$this->addMediaConversion('thumb')
					->width(50)
					->height(50)
					->withResponsiveImages();
				$this->addMediaConversion('profile')
					->width(350)
					->height(350)
					->withResponsiveImages();
			});
	}
	public function image() {
		return $this->hasOne(Media::class, 'id', 'image_id');
	}
	// IMAGE - END

	public function scopeActive($query) {
    	return $query->where('status_id',1);
	}
	public function scopeNotevicted($query) {
    	return $query->whereIn('account_standing_id', [1, 2]);
	}
    public function status() {
		return $this->belongsTo(Status::class);
	}
	public function accountStanding() {
		return $this->belongsTo(AccountStanding::class);
	}
	public function contracts() {
		return $this->hasMany(Contract::class);
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
