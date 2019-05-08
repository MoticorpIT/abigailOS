<?php

namespace App;

use Carbon\Carbon;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Company extends Model implements HasMedia
{
	use HasMediaTrait;

	// Datefields to be Mutated to Carbon Instances
	protected $dates = [
        'incorp_date'
    ];

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
                $this->addMediaConversion('invoice')
                    ->width(100)
                    ->height(100)
                    ->withResponsiveImages();
			});
	}
	public function logo() {
		return $this->hasOne(Media::class, 'id', 'logo_id');
	}
	// LOGO - END

	// SCOPES - Start
    public function scopeActive($query) {
    	return $query->where('status_id',1);
	}
	public function scopeAbcOrder($query) {
    	return $query->orderBy('name');
	}
	//  SCOPES - End
    public function status() {
		return $this->belongsTo(Status::class);
	}
	public function companyType() {
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
