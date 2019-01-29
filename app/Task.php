<?php

namespace App;

class Task extends Model
{
    public function task_type() {
		return $this->belongsTo(TaskType::class);
	}
	public function priority() {
		return $this->belongsTo(Priority::class);
	}
	public function company() {
		return $this->belongsTo(Company::class);
	}
	public function user() {
		return $this->belongsTo(User::class, 'assigned_user_id');
	}
	public function account() {
		return $this->belongsTo(Account::class);
	}
	public function asset() {
		return $this->belongsTo(Asset::class);
	}
	public function parent_task() {
		return $this->belongsTo(Task::class, 'task_id')->where('task_id','!=','');
	}
}
