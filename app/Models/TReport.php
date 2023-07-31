<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class TReport extends Model {
    protected $table = 'treport';

    protected $primaryKey = 'idReport';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'idReport',
        'description',
        'creator_role',
        'creator_data',
        'created_at',
        'updated_at',
        'idTicket',
    ];

    public function ticket()
    {
        return $this->belongsTo(TTicket::class, 'idTicket', 'idTicket');
    }
}
?>
