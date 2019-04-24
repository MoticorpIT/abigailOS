<?php

namespace App;

class Task extends Model
{
	// Datefields to be Mutated to Carbon Instances
	protected $dates = [
		'due_date'
	];
	
    public function taskType() {
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
	public function main_task()
	{
	    return $this->belongsTo(self::class, 'task_id');
	}
	public function sub_tasks()
	{
	    return $this->hasMany(self::class, 'task_id');
	}
}
