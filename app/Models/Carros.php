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
        'users_id', 'hash_id', 'ativo', 'tipo', 'nome', 'ano_fabricacao', 'ano_veiculo', 'cambio', 'km', 'placa', 'cor', 'carroceria', 'portas', 'motorizacao', 'combustivel', 'chassi', 'renavam', 'montadora', 'modelo', 'versao', 'valor_vista', 'valor_prazo', 'valor_compra', 'data_compra', 'observacoes', 'created_at', 'updated_at', 'deleted_at', 'created_from', 'updated_from', 'deleted_from'
    ];
    public $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'created_from', 'updated_from', 'deleted_from'
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_from = pegaIPUsuario();
            $model->hash_id = geraHashDados($model);
        });

        self::updating(function ($model) {
        });

        self::deleting(function ($model) {
        });
    }

    public function pegaFotos()
    {
        return $this->Hasmany('App\Models\CarrosFotos', 'carros_id', 'id')->orderby('id', 'desc');
    }
}
