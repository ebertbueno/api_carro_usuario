<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carros extends Model
{
    use SoftDeletes;

    public $table = 'carros';
    public $primarykey = 'id';
    public $fillable = [
        'users_id', 'hash_id', 'ativo', 'tipo', 'nome', 'ano_fabricacao', 'ano_veiculo', 'cambio', 'km', 'placa', 'cor', 'carroceria', 'portas', 'motorizacao', 'combustivel', 'chassi', 'renavam', 'montadora', 'modelo', 'versao', 'valor_vista', 'valor_prazo', 'valor_compra', 'data_compra', 'observacoes', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by', 'created_from', 'updated_from', 'deleted_from'
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

    public function pegaFotos()
    {
        return $this->Hasmany('App\Models\CarrosFotos', 'carros_id', 'id')->orderby('id', 'desc');
    }
}
