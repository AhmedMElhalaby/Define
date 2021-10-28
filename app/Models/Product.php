<?php

namespace App\Models;

use App\Helpers\Constant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property mixed category_id
 * @property mixed name
 * @property mixed description
 * @property mixed name_ar
 * @property mixed description_ar
 * @property mixed price
 * @property mixed number_logo
 * @method Product find(mixed $food_id)
 */
class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id','name','description','price','number_logo'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function Orders(): hasMany
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function Translate(): hasMany
    {
        return $this->hasMany(Translation::class, 'ref_id')->where('model_type', 'Product');
    }
    
     public function ProductDeliveryShopping(): hasMany
    {
        return $this->hasMany(ProductDeliveryShopping::class,'product_id');
    }
    
    /*
    |
    | start add code by Thaer Qanooa 6/7/2021
    |
    */
    public function Colors(): hasMany
    {
        return $this->hasMany(ProductColor::class);
    }
//    public function Logos(): hasMany
//    {
//        return $this->hasMany(ProductLogo::class);
//    }
    public function Quantities(): hasMany
    {
        return $this->hasMany(ProductQuantity::class);
    }

    /*
    |
    | end add code by Thaer Qanooa 6/7/2021
    |
    */

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function media(): HasMany
    {
        return $this->hasMany(Media::class,'ref_id')->where('media_type',Constant::MEDIA_TYPE['Product']);
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
     * @return int
     */
    public function getNumber_logo(): int
    {
        return $this->number_logo;
    }

    /**
     * @param int $id
     */
    public function setgetNumber_logo(int $number_logo): void
    {
        $this->number_logo = $number_logo;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id): void
    {
        $this->category_id = $category_id;
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

}
