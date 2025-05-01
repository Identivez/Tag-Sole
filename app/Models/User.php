<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Model
{
    use HasFactory;
    protected $primaryKey = 'UserId';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'UserId',
        'firstName',
        'lastName',
        'createdAt',
        'email',
        'password',
        'phoneNumber',
        'MunicipalityId',
    ];

    // Castear createdAt como datetime
    protected $casts = [
        'createdAt' => 'datetime:Y-m-d H:i:s',
    ];

    public function getRouteKeyName()
    {
        return 'UserId';
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'MunicipalityId', 'MunId');
    }

    // Hash automático de contraseña
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}
