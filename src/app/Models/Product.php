<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'barcode',
        'description',
        'category_id',
        'supplier_id',
        'unit',
        'purchase_price',
        'selling_price',
        'minimum_stock',
        'images',
        'is_active',
    ];

    protected $casts = [
        'purchase_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'minimum_stock' => 'integer',
        'images' => 'array',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }

    public function purchaseOrderItems()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    // Helper method untuk total stock across all warehouses
    public function getTotalStockAttribute(): int
    {
        return $this->stocks()->sum('quantity');
    }

    // Helper method untuk available stock (total - reserved)
    public function getAvailableStockAttribute(): int
    {
        return $this->stocks()->sum('quantity') - $this->stocks()->sum('reserved_quantity');
    }

    // Check if stock is low
    public function getIsLowStockAttribute(): bool
    {
        return $this->total_stock <= $this->minimum_stock;
    }
}
