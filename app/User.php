<?php

namespace App;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMedia
{
	use Notifiable, HasMediaTrait;

	protected $fillable = [
		'name', 'email', 'password', 'is_active',
	];

	protected $hidden = [
		'password', 'remember_token',
	];


	// SCOPES - START
	// Allows for use of ->active()
	public function scopeActive($query) {
		return $query->where('is_active',1);
	}
	// SCOPES - END


	// AVATAR - START
	public function registerMediaCollections()
	{
		$this->addMediaCollection('avatars')
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
	public function avatar() {
		return $this->hasOne(Media::class, 'id', 'avatar_id');
	}
	public function getAvatarUrlAttribute() {
		return $this->avatar->getUrl('thumb');
	}
	// AVATAR - END

	
	// GENERAL RELATIONSHIPS - START
	public function notes() {
		return $this->hasMany(Note::class);
	}
	public function tasks() {
		return $this->hasMany(Task::class);
	}
	public function files() {
		return $this->hasMany(File::class);
	}
	// GENERAL RELATIONSHIPS - END

}
