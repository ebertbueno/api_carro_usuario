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
		'users_id', 'telefone', 'cep', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'estado', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by', 'created_from', 'updated_from', 'deleted_from'
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
		});

		self::updating(function ($model) {
			$model->updated_by = (Auth()->check() ? (Auth()->user()->nivel === 'emp' ? Auth()->user()->id : Auth()->user()->emp_id) : 0);
		});

		self::deleting(function ($model) {
			$model->deleted_by = Auth()->user()->id;
		});
	}

	public function quallUsuario()
	{
		return $this->HasOne('App\Models\Users', 'id', 'users_id');
	}
}
