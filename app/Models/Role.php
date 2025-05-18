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

    /**
     * The users that belong to this role.
     *
     * Defines the many-to-many relationship between roles and users.
     * This relationship uses a pivot table 'role_user' with custom key names.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'RoleId', 'UserId');
    }

    /**
     * Check if this role has any users assigned to it.
     *
     * Useful for determining if a role can be safely deleted.
     *
     * @return bool
     */
    public function hasUsers()
    {
        return $this->users()->exists();
    }

    /**
     * Get the count of users who have this role.
     *
     * @return int
     */
    public function userCount()
    {
        return $this->users()->count();
    }

    /**
     * Determine if this is an administrative role.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->RoleId === 'admin';
    }
}
