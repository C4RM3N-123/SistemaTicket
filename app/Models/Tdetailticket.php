<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class Tdetailticket extends Model {
    protected $table = 'tticket';
    protected $primaryKey = 'idTicket';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    
}
?>