<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $primaryKey = 'idImage';
    public $incrementing = false; 
    protected $keyType = 'string'; 
    protected $guarded = []; 

    protected $fillable = [
        'idImage',
        'imageBefore',
        'imageAfter',
        'idTicket',
    ];

    // Relación con el modelo Ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'idTicket', 'idTicket');
    }
}
