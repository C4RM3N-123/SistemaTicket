<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class TPicture extends Model {
    protected $table = 'tpicture';
    protected $primaryKey = 'idImage';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false; // Puedes establecerlo en true si necesitas timestamps (created_at y updated_at).

    // Define las relaciones con otros modelos si es necesario.
    // En este caso, la relación con tticket se define de la siguiente manera:
    public function ticket()
    {
        return $this->belongsTo(TTicket::class, 'idTicket', 'idTicket');
    }
}
?>
