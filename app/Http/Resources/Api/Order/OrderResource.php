<?php

namespace App\Http\Resources\Api\Order;

use App\Helpers\Functions;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Home\DelegateResource;
use App\Http\Resources\Api\Home\UserResource;
use App\Http\Resources\Api\Home\CategoryResource;

class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        $Objects = array();
        $Objects['id'] = $this->getId();
        $Objects['user_id'] = $this->getUserId();
        $Objects['User'] = new UserResource($this->user);
        $Objects['delegate_id'] = $this->getDelegateId();
        $Objects['Delegate'] = $this->delegate?new DelegateResource($this->delegate):null;
        $Objects['amount'] = $this->getAmount();
        $Objects['shipment_number'] = $this->getShipmentNumber();
        $UserBalance = Functions::UserBalance($this->getUserId());
        if ($UserBalance >= $this->getAmount()) {
            $balance = 0;
        }else{
            $balance = $this->getAmount() - $UserBalance;
        }
        $Objects['balance'] = $balance;
        $Objects['created_at'] = Carbon::parse($this->created_at);
        $Objects['order_date'] = $this->getOrderDate();
        $Objects['order_time'] = $this->getOrderTime();
        $Objects['reject_reason'] = $this->getRejectReason();
        $Objects['cancel_reason'] = $this->getCancelReason();
        $Objects['address'] = $this->getAddress();
        $Objects['status'] = $this->getStatus();
        $Objects['lat'] = $this->getLat();
        $Objects['lng'] = $this->getLng();
        $Objects['note'] = $this->getNote();
        $Objects['status_str'] = __('crud.Order.Statuses.'.$this->getStatus());
        $Objects['OrderStatuses'] = OrderStatusResource::collection($this->order_statuses);
        $Objects['OrderProducts'] = OrderProductResource::collection($this->order_products);
        return $Objects;
    }
}
