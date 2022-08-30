<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarrosFotos extends Model
{
	use SoftDeletes;

	public $table = 'carros_fotos';
	public $primarykey = 'id';
	public $fillable = [
		'carros_id', 'imagem', 'created_at', 'updated_at', 'deleted_at', 'created_from', 'updated_from', 'deleted_from'
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

	public function qualCarro()
	{
		return $this->HasOne('App\Models\Carros', 'id', 'carros_id');
	}
}
