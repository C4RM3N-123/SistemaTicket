<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'idTicket'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 
    protected $guarded = []; 

    protected $fillable = [
        'idTicket',
        'name',
        'description',
        'prioritie',
        'type',
        'created_at',
        'ending_at',
        'idEmployee',
        'idUser',
    ];

    protected $dates = ['created_at', 'ending_at']; // Define los campos de fecha

    // Relación con el modelo Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'idEmployee', 'idEmployee');
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'idUser');
    }
}
