<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
	public $timestamps = false;
	protected $fillable = [
		'todo',
		'complete',
	];
}