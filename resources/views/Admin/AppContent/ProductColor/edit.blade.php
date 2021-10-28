@extends('AhmedPanel.crud.main')
@section('title') | {{__('admin.edit')}} {{__('crud.'.$lang.'.crud_the_name')}} @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="{{ config('app.color') }}">
                    <h4 class="title">{{__('admin.edit')}} {{__(('crud.'.$lang.'.crud_the_name'))}}</h4>
                </div>
                <div class="card-content">
                    <form action="{{url($redirect.'/'.$Object->id)}}" method="post" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                        @csrf
                        <div class="row">
                             @foreach($Fields as $Field)
                                @if(isset($Field['editable']))
                                    @if($Field['editable'])
                                        @if($Field['type'] != 'multi_checkbox' && $Field['type'] != 'images')
                                            {!! \App\Traits\AhmedPanelTrait::Fields($Field,$Object->{$Field['name']},$lang,$Object) !!}
                                        @else
                                            {!! \App\Traits\AhmedPanelTrait::Fields($Field,$Object,$lang,$Object) !!}
                                        @endif
                                    @endif
                                @else
                                    @if($Field['type'] != 'multi_checkbox' && $Field['type'] != 'images')
                                        {!! \App\Traits\AhmedPanelTrait::Fields($Field,$Object->{$Field['name']},$lang,$Object) !!}
                                    @else
                                        {!! \App\Traits\AhmedPanelTrait::Fields($Field,$Object,$lang,$Object) !!}
                                    @endif
                                @endif
                            @endforeach
                        </div>
                        @if($lang == 'Admin')
                            <div class="row">
                                <div class="col-md-12" id="Roles">
                                    <label for="Roles" class="col-md-12">{{__('crud.Role.crud_names')}}</label>
                                    <script>let RolePermission = [];</script>
                                    @foreach(\App\Models\Role::all() as $role)
                                        <div class="col-md-3">
                                            <input type="checkbox" id="{{$role->getId()}}" name="roles[]"
                                                   @if($Object->hasRole($role->getId())) checked
                                                   @endif onchange="permissionCheck()" value="{{$role->getId()}}"
                                                   class="role {{ $errors->has('roles') ? ' is-invalid' : '' }}">
                                            <label for="{{$role->getId()}}">{{$role->getName()}}</label>
                                        </div>
                                        <script>RolePermission['{{$role->getId()}}'] = [@foreach($role->role_permissions as $role_permission){{$role_permission->permission_id}} @if(!$loop->last),@endif @endforeach];</script>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if($lang == 'Admin' || $lang == 'Role')
                            <div class="row">
                                <div class="col-md-12" id="Permission">
                                    <label for="Permission"
                                           class="col-md-12">{{__('crud.Permission.crud_names')}}</label>
                                    @foreach(\App\Models\Permission::whereNull('parent_id')->get() as $permission)
                                        <div class="form-group col-md-12">
                                            <input type="checkbox" id="permission{{$permission->getId()}}"
                                                   name="permissions[]" onclick="ParentCheck({{$permission->getId()}})"
                                                   @if($Object->hasPermission($permission->getId())) checked
                                                   @endif value="{{$permission->getId()}}"
                                                   class="permission {{ $errors->has('permissions') ? ' is-invalid' : '' }}">
                                            <label for="permission{{$permission->getId()}}">{{app()->getLocale() =='ar'?$permission->getNameAr():$permission->getName()}}</label>
                                        </div>
                                        @foreach(\App\Models\Permission::where('parent_id',$permission->getId())->get() as $cPermission)
                                            <div class="form-group col-md-3">
                                                <input type="checkbox" id="permission{{$cPermission->getId()}}"
                                                       name="permissions[]"
                                                       @if($Object->hasPermission($permission->getId())) checked
                                                       @endif value="{{$cPermission->getId()}}"
                                                       onclick="TriggerParentCheck({{$permission->getId()}},{{$cPermission->getId()}})"
                                                       class="permission permission_{{$permission->getId()}} {{ $errors->has('permissions') ? ' is-invalid' : '' }}">
                                                <label for="permission{{$cPermission->getId()}}">{{app()->getLocale() =='ar'?$cPermission->getNameAr():$cPermission->getName()}}</label>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                          <div class="form-group col-md-12">
                            <label for="name" class="control-label">crud.Product.quantities *</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="checkbox" id="quantity" name="quantity[]" value="Karton"  class="permission ">
                                    <label for="quantity">Karton </label>
                                </div>


                                <div class="col-md-4">
                                    <input type="checkbox" id="quantity" name="quantity[]" value="Palle"  class="permission ">
                                    <label for="quantity">Palle </label>
                                </div>



{{--                                <div class="col-md-4">--}}
{{--                                    <input type="checkbox" id="quantity" name="quantity[]" value="Karton"  class="permission ">--}}
{{--                                    <label for="quantity">Karton </label>--}}
{{--                                </div>--}}


                            </div>

                        </div>

                        <!--<div class="col-md-12">-->
                        <!--    <div class="row" id="quantities">-->
                        <!--        @foreach($Object->Quantities as $quantity)-->
                        <!--            <div id="quantities_row0{{ $loop->index }}">-->
                        <!--                <div class="col-md-2">-->
                        <!--                    <div class="form-group label-floating ">-->
                        <!--                        <label for="name" class="control-label">crud.Product.quantities-->
                        <!--                            *</label>-->
                        <!--                        <input type="text" id="quantities" name="quantity[]"-->
                        <!--                               class="form-control "-->
                        <!--                               value="{{$quantity->quantity}}">-->
                        <!--                        <span class="material-input"></span>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-md-1">-->
                        <!--                    <div class="btn btn-danger no-text ticket-manage remove_field_quantities"-->
                        <!--                         id="0{{ $loop->index }}">حذف-->
                        <!--                    </div>-->
                        <!--                </div>-->


                        <!--            </div>-->
                        <!--        @endforeach-->
                        <!--            <div class="col-md-1">-->
                        <!--                <div class="btn btn-primary no-text ticket-manage "-->
                        <!--                     id="new_option_quantities">اضافة-->
                        <!--                </div>-->
                        <!--            </div>-->

                        <!--    </div>-->
                        <!--</div>-->
                        {{--<div class="col-md-12">--}}
                            {{--<div class="row" id="logos">--}}
                                {{--@foreach($Object->Logos as $logo)--}}
                                    {{--<div id="logos_row0{{ $loop->index }}">--}}

                                        {{--<div class="col-md-2">--}}
                                            {{--<div class="form-group label-floating ">--}}
                                                {{--<label for="name" class="control-label">crud.Product.logos *</label>--}}

                                                {{--<input type="number" id="logos" name="logo[]"--}}
                                                       {{--class="form-control "--}}
                                                       {{--value="{{$logo->logo}}">--}}
                                                {{--<span class="material-input"></span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-1">--}}
                                            {{--<div class="btn btn-danger no-text ticket-manage remove_field_logos"--}}
                                                 {{--id="0{{ $loop->index }}">حذف--}}
                                            {{--</div>--}}

                                        {{--</div>--}}

                                    {{--</div>--}}
                                {{--@endforeach--}}
                                    {{--<div class="col-md-1">--}}
                                        {{--<div class="btn btn-primary no-text ticket-manage "--}}
                                             {{--id="new_option_logos">اضافة--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        
                        

                            <div class="col-md-12">
                                <div class="row" id="delivery_shopping">
                                    @foreach($Object->ProductDeliveryShopping as $item)

                                        <div id="delivery_shopping_row0{{ $loop->index }}">


                                            <div class="col-md-5">
                                                <div class="form-group label-floating ">
                                                    <label for="delivery_shopping_name" class="control-label">delivery
                                                        shopping
                                                        name*</label>
                                                    <input type="text" id="delivery_shopping_name"
                                                           name="delivery_shopping_name[]"
                                                           class="form-control "
                                                           value="{{$item->name}}">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group label-floating ">
                                                    <label for="delivery_shopping_price" class="control-label">delivery
                                                        shopping
                                                        price *</label>
                                                    <input type="text" id="delivery_shopping_price"
                                                           name="delivery_shopping_price[]"
                                                           class="form-control "
                                                           value="{{$item->price}}">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div
                                                    class="btn btn-danger no-text ticket-manage remove_field_delivery_shopping"
                                                    id="0{{ $loop->index }}">حذف
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach



                                    <div class="col-md-12">
                                       <label for="delivery_shopping_name" class="control-label">delivery
                                                        shopping
                                                        </label>
                                        <div class="btn btn-primary no-text ticket-manage "
                                             id="new_delivery_shopping">اضافة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="col-md-12">
                            <div class="row" id="colors">
                                @foreach($Object->Colors as $Colors)

                                    <div id="colors_row0{{ $loop->index }}">


                                        <div class="col-md-2">
                                            <div class="form-group label-floating ">
                                                <label for="name" class="control-label">crud.Product.colors *</label>

                                                <input type="color" id="colors" name="color[]"
                                                       class="form-control "
                                                       value="{{$Colors->color}}">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="btn btn-danger no-text ticket-manage remove_field_colors"
                                                 id="0{{ $loop->index }}">حذف
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="col-md-1">
                                        <div class="btn btn-primary no-text ticket-manage "
                                             id="new_option_colors">اضافة
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="row submit-btn">
                            <button type="submit" class="btn btn-primary"
                                    style="margin-left:15px;margin-right:15px;">{{__('admin.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
                {{--
                |
                | quantities
                |
                --}}
        var i = 1;
        $('#new_option_quantities').on('click', function () {
            i++;
            $('#quantities').append(' <div id="quantities_row' + i + '">' +
                    '<div class="col-md-3">' +
                    '<div class="form-group label-floating is-empty">' +
                    '<label for="name" class="control-label">crud.Product.quantities *</label>' +
                    '<input type="text" id="quantities" name="quantity[]" class="form-control " value=""> <span class="material-input"></span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-1">' +
                    '<div class="btn btn-danger no-text ticket-manage remove_field_quantities" id="' + i + '" >x </div>  </div>' +
                    ' </div>');
        });
        $(document).on('click', '.remove_field_quantities', function () {
            console.log(i);
            var btn_id = $(this).attr("id");
            $('#quantities_row' + btn_id + '').remove();
        });

                {{--
                |
                | logos
                |
                --}}
//        var x = 1;
//        $('#new_option_logos').on('click', function () {
//            x++;
//            $('#logos').append(' <div id="logos_row' + x + '">' +
//                    '<div class="col-md-3">' +
//                    '<div class="form-group label-floating is-empty">' +
//                    '<label for="name" class="control-label">logo</label>' +
//                    '<input type="number" id="logos" name="logo[]" class="form-control " value=""> <span class="material-input"></span>' +
//                    '</div>' +
//                    '</div>' +
//                    '<div class="col-md-1">' +
//                    '<div class="btn btn-danger no-text ticket-manage remove_field_logos"  id="' + x + '" >x </div>  </div>' +
//                    ' </div>');
//        });
//        $(document).on('click', '.remove_field_logos', function () {
//            console.log(i);
//            var btn_id = $(this).attr("id");
//            $('#logos_row' + btn_id + '').remove();
//        });

                {{--
                |
                | colors
                |
                --}}
        var y = 1;
        $('#new_option_colors').on('click', function () {
            y++;
            $('#colors').append(' <div id="colors_row' + y + '">' +
                    '<div class="col-md-3">' +
                    '<div class="form-group label-floating is-empty">' +
                    '<label for="name" class="control-label">colors</label>' +
                    '<input type="color" id="colors" name="color[]" class="form-control " value=""> <span class="material-input"></span>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-1">' +
                    '<div class="btn btn-danger no-text ticket-manage remove_field_colors"  id="' + y + '" >x </div>  </div>' +
                    ' </div>');
        });
        $(document).on('click', '.remove_field_colors', function () {
            console.log(i);
            var btn_id = $(this).attr("id");
            $('#colors_row' + btn_id + '').remove();
        });
        
        
        
        
        var z = 1;
        $('#new_delivery_shopping').on('click', function () {
            z++;
            $('#delivery_shopping').append(`
             <div id="delivery_shopping_row` + z + `">
                                    <div class="col-md-5">
                                        <div class="form-group label-floating ">
                                            <label for="delivery_shopping_name" class="control-label">delivery shopping
                                                name*</label>
                                            <input type="text" id="delivery_shopping_name"
                                                   name="delivery_shopping_name[]"
                                                   class="form-control "
                                                   value="">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group label-floating ">
                                            <label for="delivery_shopping_price" class="control-label">delivery shopping
                                                price *</label>
                                            <input type="text" id="delivery_shopping_price"
                                                   name="delivery_shopping_price[]"
                                                   class="form-control "
                                                   value="">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                <div class="col-md-2">
                                    <div class="btn btn-danger no-text ticket-manage remove_field_delivery_shopping"  id="` + z + `" >حذف </div>  </div>
                                </div>
 </div>
`);
        });
        $(document).on('click', '.remove_field_delivery_shopping', function () {
            console.log(i);
            var btn_id = $(this).attr("id");
            $('#delivery_shopping_row' + btn_id + '').remove();
        });

        function permissionCheck() {
            let roleEls = document.getElementsByClassName('role');
            let permissionEls = document.getElementsByClassName('permission');
            for (let p = 0; p < permissionEls.length; p++) {
                // permissionEls[p].checked=false;
                permissionEls[p].disabled = false;
            }
            for (let r = 0; r < roleEls.length; r++) {
                let roleEl = roleEls[r];
                let permission = RolePermission[roleEl.id];
                for (let i = 0; i < permission.length; i++) {
                    let permissionEl = document.getElementById('permission' + permission[i]);
                    if (roleEl.checked) {
                        permissionEl.checked = true;
                        permissionEl.disabled = true;
                    }
                }
            }
        }
        permissionCheck();
        function ParentCheck(id) {
            let main_permission = document.getElementById('permission' + id);
            let permissionEls = document.getElementsByClassName('permission_' + id);
            for (let p = 0; p < permissionEls.length; p++) {
                permissionEls[p].checked = !!main_permission.checked;
            }
        }
        function TriggerParentCheck(id, id2) {
            let main_permission = document.getElementById('permission' + id);
            let sub_permission = document.getElementById('permission' + id2);
            if (sub_permission.checked) {
                main_permission.checked = true;
            }
        }
    </script>
@endsection
