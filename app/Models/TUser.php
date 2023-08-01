<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TUser extends Model
{
    protected $table = 'tuser';

    protected $primaryKey = 'idUser';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'idUser',
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'gender',
        'phone',
        'role',
        'created_at',
        'updated_at',
    ];
}
