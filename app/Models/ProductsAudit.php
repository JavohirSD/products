<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductsAudit
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProductsAudit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductsAudit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductsAudit query()
 * @mixin \Eloquent
 */
class ProductsAudit extends Model
{
    use HasFactory;

    // Define model table
    protected $table = 'product_audit';

    /**
     * Accessor for changes attribute
     * @return Attribute
     */
    protected function changes(): Attribute
    {
        return Attribute::make(
            get: fn ($changes) => json_decode($changes),
        );
    }

    protected $fillable = [
        'changes',
        'user_id',
        'product_id'
    ];

}
