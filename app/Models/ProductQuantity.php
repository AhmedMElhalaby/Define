<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property mixed product_id
 * @property integer quantity
 */
class ProductQuantity extends Model
{
    use HasFactory;
    protected $table = 'product_quantities';
    protected $fillable = ['product_id','quantity'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $status
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

}
