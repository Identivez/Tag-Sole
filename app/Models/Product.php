<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Tabla (sigue convención)
    protected $table = 'products';

    // Clave primaria personalizada
    protected $primaryKey = 'ProductId';

    // Auto‐incremental (integer)
    public $incrementing = true;
    protected $keyType = 'int';

    // Usar timestamps pero con columnas custom
    public $timestamps = true;
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'LastUpdate';

    // Campos rellenables
    protected $fillable = [
        'Name',
        'Brand',
        'Price',
        'Description',
        'Quantity',
        'Stock',
        'ProviderId',
        'CategoryId',
    ];

    // Relaciones
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'ProviderId', 'ProviderId');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryId', 'CategoryId');
    }
}
