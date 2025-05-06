<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'UserId';
    public $incrementing = false;
    protected $keyType = 'string';

    // Usar timestamps personalizados
    public $timestamps = true;
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    // Atributos rellenables
    protected $fillable = [
        'UserId',
        'firstName',
        'lastName',
        'email',
        'password',
        'phoneNumber',
        'MunicipalityId',
    ];

    // Campos ocultos en arrays y JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casteos de atributos
    protected $casts = [
        'createdAt'    => 'datetime:Y-m-d H:i:s',
        'updatedAt'    => 'datetime:Y-m-d H:i:s',
    ];

    // Ruta por la que se resuelve el modelo
    public function getRouteKeyName()
    {
        return 'UserId';
    }

    // Relación con Municipio
    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'MunicipalityId', 'MunId');
    }

    // Hash automático de la contraseña
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
