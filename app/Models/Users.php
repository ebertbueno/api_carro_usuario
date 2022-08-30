<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
	use SoftDeletes;

	public $table = 'users';
	public $primarykey = 'id';
	public $fillable = [
		'name', 'email', 'password', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by', 'created_from', 'updated_from', 'deleted_from'
	];
	public $hidden = [
		'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by', 'created_from', 'updated_from', 'deleted_from'
	];

	protected static function boot()
	{
		parent::boot();

		self::creating(function ($model) {
			$model->created_by = (Auth()->check() ? (Auth()->user()->nivel === 'emp' ? Auth()->user()->id : Auth()->user()->emp_id) : 0);
			$model->created_from = pegaIPUsuario();
			criaDadosEssenciais($model);
		});

		self::updating(function ($model) {
			$model->updated_by = (Auth()->check() ? (Auth()->user()->nivel === 'emp' ? Auth()->user()->id : Auth()->user()->emp_id) : 0);
		});

		self::deleting(function ($model) {
			$model->deleted_by = Auth()->user()->id;
		});
	}

	public function quaisDados()
	{
		return $this->HasOne('App\Models\UsersDados', 'users_id', 'id');
	}
}
