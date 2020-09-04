<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';

    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'id',
        'nombre',
    ];

    protected $guarded =[
    ];
}
