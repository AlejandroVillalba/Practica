<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $primaryKey = 'idProveedor';

    public $timestamps = false;

    protected $fillable = [
    	'nombreEmpresa',
    	'ruc',
    	'direccion',
    	'telefono',
    	'email',
    ];

    protected $guarded = [];
}
