<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Config;

/**
 * App\Models\Products
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
 * @mixin \Eloquent
 */
class Products extends Model
{
    use HasFactory;

    // Define model table
    protected $table = 'products';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->user_id = Auth::id();
        });

        self::updating(function ($model) {

            $changes = [];

            if ($model->title != $model->getOriginal('title')) {
                $changes[] = [
                    'field' => 'title',
                    'new' => $model->title,
                    'old' => $model->getOriginal('title'),
                ];
            }

            if ($model->price != $model->getOriginal('price')) {
                $changes[] = [
                    'field' => 'price',
                    'new' => $model->price,
                    'old' => $model->getOriginal('price'),
                ];
            }

            if ($model->quantity != $model->getOriginal('quantity')) {
                $changes[] = [
                    'field' => 'quantity',
                    'new' => $model->quantity,
                    'old' => $model->getOriginal('quantity'),
                ];
            }

            if ($model->status != $model->getOriginal('status')) {
                $changes[] = [
                    'field' => 'status',
                    'new' => $model->status,
                    'old' => $model->getOriginal('status'),
                ];
            }

            ProductsAudit::create([
                'changes' => json_encode($changes,JSON_UNESCAPED_UNICODE),
                'user_id' => Auth::id(),
                'product_id' => $model->id
            ]);

        });
    }

    protected $fillable = [
        'title',
        'quantity',
        'price',
        'status'
    ];

    /**
     * Calculate VAT price
     *
     * @return float
     */
    public function getVatPrice(): float
    {
        return (float)(($this->quantity * $this->price) * (1 + Config::get('vat.vat_value')));
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
