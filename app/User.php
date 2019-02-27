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

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'is_active',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function registerMediaCollections()
	{
		$this->addMediaCollection('avatars')
			->registerMediaConversions(function (Media $media = null) {
				$this->addMediaConversion('thumb')
					->width(35)
					->height(35);
				$this->addMediaConversion('profile')
					->width(350)
					->height(350);
			});
	}
	public function avatar() {
		return $this->hasOne(Media::class, 'id', 'avatar_id');
	}
	public function getAvatarUrlAttribute() {
		return $this->avatar->getUrl('thumb');
	}

	public function scopeActive($query) {
		return $query->where('is_active',1);
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
