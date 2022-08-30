<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersDados extends Model
{
	use SoftDeletes;

	public $table = 'users_dados';
	public $primarykey = 'id';
	public $fillable = [
		'users_id', 'telefone', 'cep', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'estado', 'created_at', 'updated_at', 'deleted_at', 'created_from', 'updated_from', 'deleted_from'
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

		self::updating(function ($model) {
		});

		self::deleting(function ($model) {
		});
	}

	public function quallUsuario()
	{
		return $this->HasOne('App\Models\Users', 'id', 'users_id');
	}
}
