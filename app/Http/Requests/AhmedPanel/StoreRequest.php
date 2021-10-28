<?php

namespace App\Http\Requests\AhmedPanel;

use App\Models\Media;
use App\Models\ModelPermission;
use App\Models\ModelRole;
use App\Models\RolePermission;
use App\Models\Translation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use App\Models\ProductDeliveryShopping;

class StoreRequest extends FormRequest
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
    public function rules()
    {
        return [];
    }

    public function preset($crud, $request)
    {
        $Object = $crud->getEntity();
        foreach ($crud->getFilters() as $filter){
            if ($filter['type'] == 'where'){
                $Object->{$filter['name']} = $filter['value'];
            }
            elseif ($filter['type'] == 'whereNull'){
                $Object->{$filter['name']} = null;
            }
            elseif ($filter['type'] == 'whereNotNull'){
                $Object->{$filter['name']} = null;
            }
        }
        foreach ($crud->getFields() as $field) {
            if ($field['type'] == 'image'){
                if($this->hasFile($field['name'])){
                    $attribute_name = $field['name'];
                    $destination_path = "storage/media/";
                    $attribute_value = $field['name'];
                    // if a new file is uploaded, store it on disk and its filename in the database
                    if ($this->hasFile($attribute_name)) {
                        $file = $this->file($attribute_name);
                        if ($file->isValid()) {
                            $file_name = md5($file->getClientOriginalName().time()).'.'.$file->getClientOriginalExtension();
                            $file->move($destination_path, $file_name);
                            $attribute_value =  $destination_path.$file_name;
                        }
                    }
                    $Object->{$field['name']} = $attribute_value;
                }
            }
            elseif ($field['type'] == 'multi_checkbox'){
                $MultiCheckboxField[] = $field;
            }
            elseif ($field['type'] == 'images'){
                $ImagesField[] = $field;
            }else {
                if ($this->filled($field['name'])) {
                    $Object->{$field['name']} = $this->{$field['name']};
                }
            }
        }
        $Object->save();
        foreach ($crud->getFields() as $field) {
            if (isset($field['translate'])) {
                $c = $field['name'] . '_translate';
                $langT = 0;
                foreach ($request->Language[$field['name']] as $KeyLang => $lang) {
                    foreach ($request->$c as $KeyName => $name) {
                        if ($KeyLang == $KeyName){
                                                       if ($lang != $langT && $name && $lang ){

                                Translation::create([
                                    'language_id'=>$lang,
                                    'model_type'=>$crud->getLang(),
                                    'column'=>$field['name'],
                                    'translation'=>$name,
                                    'ref_id'=>$Object->id
                                ]);
                            }

                        }
                    }
                    $langT =$lang;
                }
            }
        }


        if (isset($request->delivery_shopping_name)) {
            $nameT = 0;
            foreach ($request->delivery_shopping_name as $KeyName => $name) {

                foreach ($request->delivery_shopping_price as $KeyPrice => $price) {
                    if ($KeyName == $KeyPrice){
                        if ($name !== $nameT && $name && $price ){
                            ProductDeliveryShopping::create([
                                'name'=>$name,
                                'price'=>$price,
                                'product_id'=>$Object->id
                            ]);
                        }

                    }
                }
                $nameT =$name;
            }
        }



        $Object->refresh();
        if(isset($MultiCheckboxField)){
            foreach ($MultiCheckboxField as $MField){
                if ($this->filled($MField['name'])){
                    foreach ($this->{$MField['name']} as $MValue){
                        $Model = $MField['custom']['RelationModel']['Model'];
                        $Model->{$MField['custom']['RelationModel']['ref_id']} = $MValue;
                        $Model->{$MField['custom']['RelationModel']['id']} = $Object->getId();
                        $Model->save();
                    }
                }
            }
        }
        if(isset($ImagesField)){
            foreach ($ImagesField as $IField){
                foreach ($this->file($IField['name']) as $IValue){
                    $Model = new Media();
                    $Model->setFile($IValue);
                    $Model->setMediaType($IField['media_type']);
                    $Model->setRefId($Object->id);
                    $Model->save();
                }
            }
        }
        if($crud->getLang() == 'Admin'){
            if($this->filled('roles')) {
                foreach ($this->roles as $role_id) {
                    $RolePermission = new ModelRole();
                    $RolePermission->setModelId($Object->getId());
                    $RolePermission->setRoleId($role_id);
                    $RolePermission->save();
                    foreach (RolePermission::where('role_id', $role_id)->get() as $Permission) {
                        $RolePermission = new ModelPermission();
                        $RolePermission->setModelId($Object->getId());
                        $RolePermission->setPermissionId($Permission->getPermissionId());
                        $RolePermission->save();
                    }
                }
            }
        }
        if($crud->getLang() == 'Admin'){
            if($this->filled('permissions'))
            {
                if ($crud->getLang() == 'Admin'){
                    foreach ($this->permissions as $permission_id){
                        $RolePermission = new ModelPermission();
                        $RolePermission->setModelId($Object->getId());
                        $RolePermission->setPermissionId($permission_id);
                        $RolePermission->save();
                    }
                }
                if ($crud->getLang() == 'Role'){
                    foreach ($this->permissions as $permission_id){
                        $RolePermission = new RolePermission();
                        $RolePermission->setRoleId($Object->getId());
                        $RolePermission->setPermissionId($permission_id);
                        $RolePermission->save();
                    }
                }
            }
        }
        if (isset($request->quantity)){
          $this->ProductAttachments($request->quantity, $Object->getId(), 'App\Models\ProductQuantity', 'quantity');}
        if (isset($request->color)){
             $this->ProductAttachments($request->color, $Object->getId(), 'App\Models\ProductColor', 'color');
        }
        return redirect($crud->getRedirect())->with('status', __('admin.messages.saved_successfully'));
    }
    
    
    
    public function ProductAttachments($data, $id, $model, $column)
    {
        if ($data[0] != null && $data[0] != '#') {
            foreach ($data as $k => $v) {
                $models = new $model();
                $models->$column = $v;
                $models->product_id = $id;
                $models->save();
            }
        }else{
            $models = new $model();
            $models->$column = $data;
            $models->product_id = $id;
            $models->save();
        }
    }
}
