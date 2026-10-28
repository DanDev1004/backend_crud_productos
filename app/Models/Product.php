<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id'
    ];


    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock' => 'integer',
            'category_id' => 'integer',
        ];
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }
}