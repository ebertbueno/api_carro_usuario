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
		'name', 'email', 'password', 'created_at', 'updated_at', 'deleted_at', 'created_from', 'updated_from', 'deleted_from'
	];
	public $hidden = [
		'created_at', 'updated_at', 'deleted_at', 'created_from', 'updated_from', 'deleted_from'
	];

	protected static function boot()
	{
		parent::boot();

		self::creating(function ($model) {
			$model->created_from = pegaIPUsuario();
		});

		self::created(function ($model) {
			Model('UsersDados')::create(['users_id' => $model->id]);
		});

		self::updating(function ($model) {
			$model->updated_from = pegaIPUsuario();
		});

		self::deleting(function ($model) {
			$model->deleted_from = pegaIPUsuario();
		});
	}

	public function quaisDados()
	{
		return $this->HasOne('App\Models\UsersDados', 'users_id', 'id');
	}

	public function retornaCarros()
	{
		return $this->HasMany('App\Models\Carros', 'id', 'users_id');
	}
}
