<?php

namespace App;

class Priority extends Model
{
    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
