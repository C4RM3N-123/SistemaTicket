<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTicket extends Model
{
    use HasFactory;

    protected $primaryKey = 'idDetail';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = []; 

    protected $fillable = [
        'idDetail',
        'state',
        'idTicket',
        'idAdmin',
    ];

    // Define que el campo 'state' es de tipo booleano
    protected $casts = [
        'state' => 'boolean',
    ];

    // Relación con el modelo Ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'idTicket', 'idTicket');
    }

    // Relación con el modelo Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'idAdmin', 'idAdmin');
    }
}
