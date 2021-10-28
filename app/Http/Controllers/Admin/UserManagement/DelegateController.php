<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\UserManagement\User\ActiveEmailMobileRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Traits\AhmedPanelTrait;

class DelegateController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('user_managements/delegates');
        $this->setEntity(new User());
        $this->setTable('users');
        $this->setLang('Delegate');
        $this->setFilters([
            'type'=>[
                'name'=>'type',
                'type'=>'where',
                'value'=>Constant::USER_TYPE['Delegate']
            ]
        ]);
        $this->setColumns([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'mobile'=> [
                'name'=>'mobile',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'email'=> [
                'name'=>'email',
                'type'=>'email',
                'is_searchable'=>true,
                'order'=>true
            ],
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_searchable'=>true,
                'order'=>true
            ],
            'created_at'=> [
                'name'=>'created_at',
                'type'=>'datetime',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'name'=>[
                'name'=>'name',
                'type'=>'text',
                'is_required'=>true
            ],
            'mobile'=>[
                'name'=>'mobile',
                'type'=>'text',
                'is_required'=>true
            ],
            'email'=>[
                'name'=>'email',
                'type'=>'text',
                'is_required'=>true
            ],
            'password'=> [
                'name'=>'password',
                'type'=>'password',
                'confirmation'=>true,
                'editable'=>false,
                'is_required'=>true,
                'export'=>false
            ],
            'country_id'=>[
                'name'=>'country_id',
                'type'=>'custom_relation',
                 'relation'=>[
                    'data'=> Country::all(),
                    'custom'=>function($Object){
                        return ($Object)?(session('my_locale')=='en')?$Object->getName():$Object->getName():'-';
                    },
                    'entity'=>'country'
                ],
                'is_required'=>true
            ],
            'city_id'=>[
                'name'=>'city_id',
                'type'=>'custom_relation',
                 'relation'=>[
                    'data'=> City::all(),
                    'custom'=>function($Object){
                        return ($Object)?(session('my_locale')=='en')?$Object->getName():$Object->getName():'-';
                    },
                    'entity'=>'city'
                ],
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'active_mobile_email'=>[
                'route'=>'active_mobile_email',
                'icon'=>'fa-check-square',
                'lang'=>__('crud.Delegate.Links.active_mobile_email',[],session('my_locale')),
                'condition'=>function ($Object){
                    return (is_null($Object->getEmailVerifiedAt())|| is_null($Object->getMobileVerifiedAt()));
                }
            ],
            'active',
            'change_password',
        ]);
    }
    public function active_mobile_email($id,ActiveEmailMobileRequest $request){
        return $request->preset($this,$id);
    }
}
