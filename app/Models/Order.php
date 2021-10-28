<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer id
 * @property mixed user_id
 * @property mixed delegate_id
 * @property mixed status
 * @property mixed amount
 * @property mixed order_date
 * @property mixed order_time
 * @property mixed address
 * @property mixed note
 * @property mixed lat
 * @property mixed lng
 * @property mixed reject_reason
 * @property mixed shipment_number
 * @property mixed cancel_reason
 * @method Order find(mixed $order_id)
 */
class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id','delegate_id','status','amount','order_date','shipment_number','order_time','address','note','reject_reason','cancel_reason','lat','lng'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function delivery(): BelongsTo
    {
        return $this->belongsTo(User::class,'delivery_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function order_statuses(): HasMany
    {
        return $this->hasMany(OrderStatus::class);
    }
    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
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
    public function getDelegateId()
    {
        return $this->delegate_id;
    }

    /**
     * @param mixed $delegate_id
     */
    public function setDelegateId($delegate_id): void
    {
        $this->delegate_id = $delegate_id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @param mixed $order_date
     */
    public function setOrderDate($order_date): void
    {
        $this->order_date = $order_date;
    }

    /**
     * @return mixed
     */
    public function getShipmentNumber()
    {
        return $this->shipment_number;
    }

    /**
     * @param mixed $order_date
     */
    public function setShipmentNumber($shipment_number): void
    {
        $this->shipment_number = $shipment_number;
    }

    /**
     * @return mixed
     */
    public function getOrderTime()
    {
        return $this->order_time;
    }

    /**
     * @param mixed $order_time
     */
    public function setOrderTime($order_time): void
    {
        $this->order_time = $order_time;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note): void
    {
        $this->note = $note;
    }

    /**
     * @return mixed
     */
    public function getRejectReason()
    {
        return $this->reject_reason;
    }

    /**
     * @param mixed $reject_reason
     */
    public function setRejectReason($reject_reason): void
    {
        $this->reject_reason = $reject_reason;
    }

    /**
     * @return mixed
     */
    public function getCancelReason()
    {
        return $this->cancel_reason;
    }

    /**
     * @param mixed $cancel_reason
     */
    public function setCancelReason($cancel_reason): void
    {
        $this->cancel_reason = $cancel_reason;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     */
    public function setLng($lng): void
    {
        $this->lng = $lng;
    }

}
