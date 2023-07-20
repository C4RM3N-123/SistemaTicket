<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'idAdmin'; // Define el nombre de la clave primaria personalizada
    public $incrementing = false; // Indica que la clave primaria no es un número autoincremental
    protected $keyType = 'string'; // Indica el tipo de dato de la clave primaria
    protected $guarded = []; // Indica los campos que no pueden ser asignados en masa (none in this case)
    
    protected $fillable = [
        'idAdmin',
        'first_name',
        'last_name',
        'email',
        'username',
        'dni',
        'gender',
        'password',
    ];

    protected $casts = [
        'gender' => 'boolean', // Define el casting de 'gender' a tipo booleano
    ];

    public $timestamps = true; // Indica si la tabla tiene las columnas 'created_at' y 'updated_at'
    protected $dates = ['created_at', 'updated_at']; // Define los campos de fecha

    // Aquí puedes agregar relaciones con otros modelos, si las hay
}
