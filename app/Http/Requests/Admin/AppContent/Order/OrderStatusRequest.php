<?php

namespace App\Http\Requests\Admin\AppContent\Order;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Models\Media;
use App\Models\ModelPermission;
use App\Models\ModelRole;
use App\Models\RolePermission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Mpdf\Tag\P;

class OrderStatusRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'order_id'=>'required|exists:orders,id',
            'delegate_id'=>'nullable|exists:users,id',
            'status'=>'required|numeric|in:'.Constant::ORDER_STATUSES_RULES
        ];
    }

    public function preset($crud)
    {
        $Object = ($crud->getEntity())->find($this->order_id);
        if ($this->status == Constant::ORDER_STATUSES['Accept']){
            $Object->setDelegateId($this->delegate_id);
            $Object->setStatus(Constant::ORDER_STATUSES['Accept']);
            $Object->save();
            Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['Accept']);
            if ($Object->user){
                Functions::SendNotification($Object->user,'Order Accept','Your order is accepted !','الموافقة على الطلب !','تمت الموافقة على طلبك',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
            }
            if ($Object->delegate){
                Functions::SendNotification($Object->delegate,'New Order','Your have new order !','لديك طلب جديد !','يوجد لديك طلب جديد ',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
            }
        }
        if ($this->status == Constant::ORDER_STATUSES['Rejected']){
            $Object->setRejectReason(@$this->reject_reason);
            $Object->setStatus($this->status);
            $Object->save();
            Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['Rejected']);
            Functions::SendNotification($Object->user,'Order Rejected','Provider Rejected your order !','الرفض على الطلب !','تم رفض طلبك',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
        }
        
         if ($this->status == Constant::ORDER_STATUSES['InProgress']){
            $Object->setStatus(Constant::ORDER_STATUSES['InProgress']);
            $Object->save();
            Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['InProgress']);
            Functions::SendNotification($Object->user,'Order In Progress','Provider start work your order !','الطلب قيد التنفيذ !','قام المزود ببدء العمل',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
        }

        if ($this->status == Constant::ORDER_STATUSES['Finished']){
            $Object->setStatus(Constant::ORDER_STATUSES['Finished']);
            $Object->save();
            Functions::ChangeOrderStatus($Object->getId(),Constant::ORDER_STATUSES['Finished']);
            Functions::SendNotification($Object->user,'Order Finished','Provider Finished the order !','تم إنهاء الطلب','قام التقني بإنهاء الطلب',$Object->getId(),Constant::NOTIFICATION_TYPE['Order']);
        }





        return redirect($crud->getRedirect())->with('status', __('admin.messages.saved_successfully'));
    }
}
