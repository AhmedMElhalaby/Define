@extends('AhmedPanel.crud.main')
@section('out-content')
    <div class="modal fade" id="accept_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{url('app_content/orders/status')}}" method="post">
                @csrf
                <input type="hidden" name="order_id" value="{{$Object->getId()}}">
                <input type="hidden" name="status" value="{{\App\Helpers\Constant::ORDER_STATUSES['Accept']}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">{{__('crud.Order.accept_order')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="delegate_id" class="control-label">{{__('crud.Order.delegate_id')}}
                                        *</label>
                                    <select name="delegate_id" style="margin: 0;padding: 0" id="delegate_id"
                                            class="form-control">
                                        <option value="">-</option>
                                        @foreach(\App\Models\User::where('type',\App\Helpers\Constant::USER_TYPE['Delegate'])->get() as $delegate)
                                            <option value="{{$delegate->getId()}}">{{$delegate->getName()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('delegate_id'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('delegate_id') }}</strong>
                                </span>
                                @endif
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{__('admin.cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('crud.Order.accept_order')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="reject_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{url('app_content/orders/status')}}" method="post">
                @csrf
                <input type="hidden" name="order_id" value="{{$Object->getId()}}">
                <input type="hidden" name="status" value="{{\App\Helpers\Constant::ORDER_STATUSES['Rejected']}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">{{__('crud.Order.reject_order')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="reject_reason" class="control-label">{{__('crud.Order.reject_reason')}}
                                        *</label>
                                    <textarea id="reject_reason" name="reject_reason" required
                                              class="form-control {{ $errors->has('reject_reason') ? ' is-invalid' : '' }}"></textarea>
                                </div>
                                @if ($errors->has('reject_reason'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('reject_reason') }}</strong>
                                </span>
                                @endif
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{__('admin.cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('crud.Order.reject_order')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--    @DD($Object)--}}
    <div class="modal fade" id="shipment_number_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{url('app_content/orders/shipmentNumber')}}" method="post">
                @csrf
                <input type="hidden" name="order_id" value="{{$Object->getId()}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">{{__('crud.Order.shipment_number')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="shipment_number"
                                           class="control-label">{{__('crud.Order.shipment_number')}}
                                        *</label>
                                    <input id="shipment_number" type="text" name="shipment_number" required
                                           class="form-control {{ $errors->has('shipment_number') ? ' is-invalid' : '' }}"
                                           value="{{$Object->getShipmentNumber() == null ? '': $Object->getShipmentNumber()}}">
                                </div>
                                @if ($errors->has('shipment_number'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('shipment_number') }}</strong>
                                </span>
                                @endif
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{__('admin.cancel')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('crud.Order.add')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header " data-background-color="{{ config('app.color') }}">
                    <h4 class="title"
                        style="display: inline-block">{{__('admin.show')}} {{__(('crud.'.$lang.'.crud_the_name'))}}</h4>
                    @if($Object->getStatus() == \App\Helpers\Constant::ORDER_STATUSES['New'])
                        <a href="#" data-toggle="modal" data-target="#accept_order" class="btn btn-white"
                           style="margin: 0 10px;float: @if(app()->getLocale()=='ar') left @else right @endif"><i
                                class="fa fa-check"></i> {{__('crud.Order.accept_order')}}</a>
                    @endif
                    @if($Object->getStatus() == \App\Helpers\Constant::ORDER_STATUSES['New'])
                        <a href="#" data-toggle="modal" data-target="#reject_order" class="btn btn-danger"
                           style="margin: 0 10px;float: @if(app()->getLocale()=='ar') left @else right @endif"><i
                                class="fa fa-close"></i> {{__('crud.Order.reject_order')}}</a>
                    @endif
                    @if($Object->getStatus() == \App\Helpers\Constant::ORDER_STATUSES['Accept'])
                        <form style="margin: -11px 10px 0; float: right;" action="{{url('app_content/orders/status')}}"
                              method="post">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$Object->getId()}}">
                            <input type="hidden" name="status"
                                   value="{{\App\Helpers\Constant::ORDER_STATUSES['InProgress']}}">

                            <button type="submit" class="btn btn-white"><i
                                    class="fa fa-check"></i> {{__('crud.Order.InProgress')}}</button>
                        </form>
                    @endif
                    @if($Object->getStatus() == \App\Helpers\Constant::ORDER_STATUSES['InProgress'])
                        <form style="margin: -11px 10px 0; float: right;" action="{{url('app_content/orders/status')}}"
                              method="post">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$Object->getId()}}">
                            <input type="hidden" name="status"
                                   value="{{\App\Helpers\Constant::ORDER_STATUSES['Finished']}}">

                            <button type="submit" class="btn btn-white"><i
                                    class="fa fa-check"></i> Finished
                            </button>
                        </form>
                    @endif
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.'.$lang.'.user_id')}}</th>
                                            <td style="border-top: none !important;">{{$Object->user->getName()}}</td>
                                        </tr>
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.'.$lang.'.status')}}</th>
                                            <td style="border-top: none !important;">{{__('crud.Order.Statuses.'.$Object->getStatus())}}</td>
                                        </tr>

                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.'.$lang.'.order_date')}}</th>
                                            <td style="border-top: none !important;">{{$Object->getOrderDate()}}</td>
                                        </tr>
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.'.$lang.'.order_time')}}</th>
                                            <td style="border-top: none !important;">{{\Carbon\Carbon::parse($Object->getOrderTime())->format('h:i A')}}</td>
                                        </tr>


                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.'.$lang.'.note')}}</th>
                                            <td style="border-top: none !important;">{{$Object->getNote()}}</td>
                                        </tr>
                                        @if($Object->getStatus() == \App\Helpers\Constant::ORDER_STATUSES['Rejected'])
                                            <tr>
                                                <th style="border-top: none !important;">{{__('crud.'.$lang.'.reject_reason')}}</th>
                                                <td style="border-top: none !important;">{{$Object->getRejectReason()}}</td>
                                            </tr>
                                        @endif
                                        @if($Object->getStatus() == \App\Helpers\Constant::ORDER_STATUSES['Canceled'])
                                            <tr>
                                                <th style="border-top: none !important;">{{__('crud.'.$lang.'.cancel_reason')}}</th>
                                                <td style="border-top: none !important;">{{$Object->getCancelReason()}}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.'.$lang.'.amount')}}</th>
                                            <td style="border-top: none !important;">{{$Object->getAmount()}}</td>
                                        </tr>
                                        <tr>
                                            <th style="border-top: none !important;">address</th>
                                            <td style="border-top: none !important;">{{$Object->address}}</td>

                                        </tr>
                                        <tr>
                                            <th style="border-top: none !important;">postion</th>
                                            <td style="border-top: none !important;">lang
                                                : {{$Object->lang ? $Object->lang : " - "}} <br> lat
                                                : {{$Object->lat ? $Object->lat : " - "}} </td>

                                        </tr>
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.'.$lang.'.count')}}</th>
                                            @foreach($Object->order_products as $order_status)
                                                <td style="border-top: none !important;">{{$order_status->getCount()}}</td>
                                            @endforeach
                                        </tr>


                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.'.$lang.'.shipment_number')}}</th>
                                            <td style="border-top: none !important;">{{$Object->getShipmentNumber() == null ? "قيد الشحن": $Object->getShipmentNumber()}}</td>
                                            <td style="border-top: none !important;">

                                                <a href="#" data-toggle="modal" data-target="#shipment_number_order"
                                                   class="btn btn-white"
                                                   style="margin: 0 10px;float: @if(app()->getLocale()=='ar') left @else right @endif"><i
                                                        class="fa fa-check"></i> تعديل </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center" style="padding: 5px"
                                     data-background-color="{{ config('app.color') }}">
                                    <h4 class="title"> {{__('crud.Order.statuses_history')}}</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="border-top: none !important;">{{__('crud.Order.status')}}</th>
                                            <th style="border-top: none !important;">{{__('crud.Order.created_at')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Object->order_statuses as $order_status)
                                            <tr>
                                                <td>{{__('crud.Order.Statuses.'.$order_status->getStatus())}}</td>
                                                <td>{{\Carbon\Carbon::parse($order_status->created_at)->format('Y-m-d h:i A')}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center" style="padding: 5px"
                                     data-background-color="{{ config('app.color') }}">
                                    <h4 class="title"> {{__('crud.Order.food_list')}}</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <th>{{__('Product')}}</th>
                                        <th>{{__('Price')}}</th>
                                        <th>{{__('color')}}</th>
                                        <th>{{__('quantity')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($Object->order_products as $order_products)
                                            <tr>
                                                <td>{{$order_products->getName()}}</td>
                                                <td>{{$order_products->getPrice()}}</td>
                                                <td style="background: {{$order_products->getColor()}}">{{$order_products->getColor()}}</td>
                                                <td style="border-top: none !important;">{{$order_products->Quantitys != null ? $order_products->Quantitys->quantity:''}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
