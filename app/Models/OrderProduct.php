<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property mixed order_id
 * @property mixed product_id
 * @property mixed name
 * @property mixed description
 * @property mixed name_ar
 * @property mixed description_ar
 * @property mixed price
 * @property mixed quantity
 * @property mixed delivery_shopping_id
 * @property mixed count
 * @property mixed color
 * @property mixed logo
 */
class OrderProduct extends Model
{
    protected $table = 'orders_products';
    protected $fillable = ['order_id','product_id','name','delivery_shopping_id','count','description','logo','price','quantity','color'];
    public function Translate(): hasMany
    {
        return $this->hasMany(Translation::class, 'ref_id')->where('model_type', 'OrderProduct');
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
 public function  Quantitys(): BelongsTo
    {
        return $this->belongsTo(ProductQuantity::class,'quantity','id');
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
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }
    /**
     * @return int
     */
    public function getDeliveryShopping(): int
    {
        return $this->delivery_shopping_id;
    }

    /**
     * @param int $delivery_shopping_id
     */
    public function setDeliveryShopping(int $delivery_shopping_id): void
    {
        $this->delivery_shopping_id = $delivery_shopping_id;
    }
    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getNameAr()
    {
        return $this->name_ar;
    }

    /**
     * @param mixed $name_ar
     */
    public function setNameAr($name_ar): void
    {
        $this->name_ar = $name_ar;
    }
    
    
    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count): void
    {
        $this->count= $count;
    }
    
    

    /**
     * @return mixed
     */
    public function getDescriptionAr()
    {
        return $this->description_ar;
    }

    /**
     * @param mixed $description_ar
     */
    public function setDescriptionAr($description_ar): void
    {
        $this->description_ar = $description_ar;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }
   /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $quantity
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }
   /**
     * @return mixed
     */
    public function geLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $quantity
     */
    public function setLogo($logo): void
    {
        $this->logo = $logo;
    }

}
