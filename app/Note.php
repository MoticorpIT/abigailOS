<?php

namespace App;

class Note extends Model
{
    public function companies() {
		return $this->belongsTo(Company::class);
	}
}
