<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Clave primaria personalizada
    protected $primaryKey = 'RoleId';

    // No es auto‐incremental (string)
    public $incrementing = false;

    // Tipo de la PK
    protected $keyType = 'string';

    // Campos rellenables
    protected $fillable = ['RoleId','Name'];

    // No usamos created_at / updated_at
    public $timestamps = false;

    /**
     * Usar RoleId para el route‐model binding
     */
    public function getRouteKeyName()
    {
        return 'RoleId';
    }
}
