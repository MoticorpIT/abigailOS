<?php

namespace App;

class TaskType extends Model
{
    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
