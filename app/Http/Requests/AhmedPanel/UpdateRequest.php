<?php

namespace App\Http\Requests\AhmedPanel;

use App\Models\Admin;
use App\Models\Media;
use App\Models\ModelPermission;
use App\Models\ModelRole;
use App\Models\RolePermission;
use App\Models\Translation;
use App\Traits\AhmedPanelTrait;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\ProductColor;
use App\Models\ProductDeliveryShopping;
use App\Models\ProductQuantity;

class UpdateRequest extends FormRequest
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
    public function preset($crud,$id,$request){
        $Object = $crud->getEntity()->find($id);
        if(!$Object)
            return $crud->wrongData();
        foreach ($crud->getFields() as $field){
            if ($field['type'] == 'image'){
                if ( $this->hasFile($field['name'])){
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
                if ($this->filled($field['name'])){
                    $Object->{$field['name']} = $this->{$field['name']};
                }
            }
        }
        $Object->save();


        foreach ($crud->getFields() as $field) {
            if (isset($field['translate'])) {
                $c = $field['name'] . '_translate';
                foreach ($request->Language[$field['name']] as $KeyLang => $lang) {
                    if ($lang != null) {
                        foreach ($request->$c as $KeyName => $name) {
                            $Translate = Translation::where('language_id', $lang)->where('column', $field['name'])->where('model_type', $crud->getLang())->first();
                            if ($KeyLang == $KeyName) {
                                if ($Translate != null) {
                                    $translate = Translation::find($Translate->id);
                                    $translate->language_id = $lang;
                                    $translate->model_type = $crud->getLang();
                                    $translate->column = $field['name'];
                                    $translate->translation = $name;
                                    $translate->save();
                                } else {
                                    Translation::create(
                                        [
                                            'language_id' => $lang,
                                            'model_type' => $crud->getLang(),
                                            'column' => $field['name'],
                                            'translation' => $name,
                                            'ref_id' => $id
                                        ]);
                                }
                            }
                        }
                    }
                }
            }
        }
        
        
                if (isset($request->delivery_shopping_name)) {
            $Object->ProductDeliveryShopping()->delete();
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


        if(isset($MultiCheckboxField)){
            foreach ($MultiCheckboxField as $MField){
                $Model = $MField['custom']['RelationModel']['Model'];
                $Model->where($MField['custom']['RelationModel']['id'],$Object->getId())->delete();
                if ($this->filled($MField['name'])) {
                    if (is_array($this->{$MField['name']})) {
                        foreach ($this->{$MField['name']} as $MValue) {
                            $Model = $MField['custom']['RelationModel']['Model'];
                            $Model->{$MField['custom']['RelationModel']['ref_id']} = $MValue;
                            $Model->{$MField['custom']['RelationModel']['id']} = $Object->getId();
                            $Model->save();
                        }
                    }
                }
            }
        }
        if(isset($ImagesField)){
            foreach ($ImagesField as $IField){
                if($this->hasFile($IField['name'])){
                     foreach ($this->file($IField['name']) as $IValue){
                         $Model = new Media();
                         $Model->setFile($IValue);
                         $Model->setMediaType($IField['media_type']);
                         $Model->setRefId($Object->id);
                         $Model->save();
                     }
                }
            }
        }
        if($crud->getLang() == 'Admin') {
            ModelRole::where('model_id',$Object->getId())->delete();
            ModelPermission::where('model_id',$Object->getId())->delete();
            if ($this->filled('roles')) {
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
        if($crud->getLang() == 'Admin' || $crud->getLang() == 'Role') {
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
            ProductQuantity::where('product_id', $id)->delete();
            $this->ProductAttachments($request->quantity, $id, 'App\Models\ProductQuantity', 'quantity');
        }
           
        if (isset($request->color)){
            ProductColor::where('product_id', $id)->delete();
            $this->ProductAttachments($request->color, $id, 'App\Models\ProductColor', 'color');
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
