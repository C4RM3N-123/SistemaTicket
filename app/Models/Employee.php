<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEmployee';
    public $incrementing = false; 
    protected $keyType = 'string'; 
    protected $guarded = []; 

    protected $fillable = [
        'idEmployee',
        'first_name',
        'last_name',
        'email',
        'username',
        'dni',
        'phone',
        'gender',
        'occupation',
        'password',
    ];

    protected $casts = [
        'gender' => 'boolean', // Define el casting de 'gender' a tipo booleano
    ];

    public $timestamps = true; // Indica si la tabla tiene las columnas 'created_at' y 'updated_at'
    protected $dates = ['created_at', 'updated_at']; // Define los campos de fecha

    // Aquí puedes agregar relaciones con otros modelos, si las hay

}
