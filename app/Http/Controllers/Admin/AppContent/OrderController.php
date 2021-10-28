<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\AppContent\Order\OrderStatusRequest;
use App\Models\Order;
use App\Models\User;
use App\Traits\AhmedPanelTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_content/orders');
        $this->setEntity(new Order());
        $this->setTable('orders');
        $this->setLang('Order');
        $this->setViewShow('Admin.AppContent.Order.show');
        $this->setCreate(false);
        $this->setColumns([
            'user_id' => [
                'name' => 'user_id',
                'type' => 'custom_relation',
                'relation' => [
                    'data' => User::all(),
                    'custom' => function ($Object) {
                        return ($Object) ? $Object->getName() : '-';
                    },
                    'entity' => 'user'
                ],
                'is_searchable' => true,
                'order' => true
            ],
            'order_date' => [
                'name' => 'order_date',
                'type' => 'datetime',
                'is_searchable' => true,
                'order' => true
            ],
            'status' => [
                'name' => 'status',
                'type' => 'select',
                'data' => [
                    Constant::ORDER_STATUSES['New'] => __('crud.Order.Statuses.' . Constant::ORDER_STATUSES['New'], [], session('my_locale')),
                    Constant::ORDER_STATUSES['Accept'] => __('crud.Order.Statuses.' . Constant::ORDER_STATUSES['Accept'], [], session('my_locale')),
                    Constant::ORDER_STATUSES['Rejected'] => __('crud.Order.Statuses.' . Constant::ORDER_STATUSES['Rejected'], [], session('my_locale')),
                    Constant::ORDER_STATUSES['Canceled'] => __('crud.Order.Statuses.' . Constant::ORDER_STATUSES['Canceled'], [], session('my_locale')),
                    Constant::ORDER_STATUSES['InProgress'] => __('crud.Order.Statuses.' . Constant::ORDER_STATUSES['InProgress'], [], session('my_locale')),
                    Constant::ORDER_STATUSES['Finished'] => __('crud.Order.Statuses.' . Constant::ORDER_STATUSES['Finished'], [], session('my_locale')),
                ],
                'is_searchable' => true,
                'order' => true
            ],
        ]);
        $this->SetLinks([
            'show',
        ]);
    }

    public function change_status(OrderStatusRequest $request)
    {
        return $request->preset($this);
    }

    public function shipment_number(Request $request)
    {
        $validated = $request->validate([
            'shipment_number' => 'required',
            'order_id' => 'required',
        ]);
//        dd($request->all());

        Order::updateOrCreate(
            ['id' => $request->order_id],
            [
                'shipment_number' => $request->shipment_number,

            ]
        );
        return redirect($this->getRedirect())->with('status', __('admin.messages.saved_successfully'));

    }
}
