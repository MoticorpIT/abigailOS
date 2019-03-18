<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Account extends Model implements HasMedia
{
	use HasMediaTrait;

	// LOGO - START
	public function registerMediaCollections()
	{
		$this->addMediaCollection('accounts')
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
	public function logo() {
		return $this->hasOne(Media::class, 'id', 'logo_id');
	}
	// LOGO - END

	public function scopeActive($query) {
    	return $query->where('status_id',1);
	}
    public function company() {
		return $this->belongsTo(Company::class);
	}
	public function asset() {
		return $this->belongsTo(Asset::class);
	}
	public function status() {
		return $this->belongsTo(Status::class);
	}
	public function AccountType() {
		return $this->belongsTo(AccountType::class, 'account_type_id');
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
