<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer id
 * @property mixed user_id
 * @property mixed product_id
 */
class Favourite extends Model
{
    protected $table = 'favourites';
    protected $fillable = ['user_id','product_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function food(): BelongsTo
    {
        return $this->belongsTo(Product::class);
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $food_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

}
