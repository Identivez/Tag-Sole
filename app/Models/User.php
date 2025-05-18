<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'remember_token',
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
        'email_verified_at' => 'datetime',
    ];

    // Relaciones

    /**
     * Relación con Municipio
     */
    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'MunicipalityId', 'MunId');
    }

    /**
     * Los roles que pertenecen al usuario
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'UserId', 'RoleId');
    }

    /**
     * Verifica si el usuario tiene un rol específico
     *
     * @param string $roleId
     * @return bool
     */
    public function hasRole($roleId)
    {
        return $this->roles()->where('RoleId', $roleId)->exists();
    }

    // Accessors y Mutators

    /**
     * Ruta por la que se resuelve el modelo
     */
    public function getRouteKeyName()
    {
        return 'UserId';
    }

    /**
     * Hash automático de la contraseña
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    /**
     * Getter virtual para compatibilidad con Breeze (espera un campo 'name')
     */
    public function getNameAttribute()
    {
        return "{$this->firstName} {$this->lastName}";
    }

    /**
     * Setter virtual para compatibilidad con Breeze
     */
    public function setNameAttribute($value)
    {
        $names = explode(' ', $value, 2);
        $this->attributes['firstName'] = $names[0] ?? '';
        $this->attributes['lastName'] = isset($names[1]) ? $names[1] : '';
    }

    // Eventos del modelo

    /**
     * Método para crear un nuevo usuario con UUID automático
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->UserId)) {
                $model->UserId = (string) Str::uuid();
            }
        });
    }
}
