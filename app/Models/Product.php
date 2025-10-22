<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model {
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'name','description','category_id','price','discount_percent','rating',
        'sold_count','stock','main_image', 'other_images','warranty','spec'
    ];
    protected $casts = [
        'spec' => 'array',
        'other_images' => 'array',
        'price' => 'decimal:2',
        'discount_percent' => 'decimal:2',
        'rating' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
