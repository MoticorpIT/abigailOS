<?php

namespace App;

use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Company extends Model implements HasMedia
{
	use HasMediaTrait;

	// LOGO - START
	public function registerMediaCollections()
	{
		$this->addMediaCollection('companies')
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
	public function files() {
		return $this->hasMany(File::class);
	}
}