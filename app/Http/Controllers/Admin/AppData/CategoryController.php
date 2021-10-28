<?php

namespace App\Http\Controllers\Admin\AppData;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use App\Traits\AhmedPanelTrait;

class CategoryController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_data/categories');
        $this->setEntity(new Category());
        $this->setTable('categories');
        $this->setLang('Category');
        $this->setColumns([
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_searchable'=>true,
                'order'=>true
            ],
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],

            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'name'=> [
                'name'=>'name',
                'type'=>'text',
                'translate'=>true,

                'is_required'=>true
            ],
//            'name_ar'=> [
//                'name'=>'name_ar',
//                'type'=>'text',
//                'is_required'=>true
//            ],
            'description'=> [
                'name'=>'description',
                'type'=>'text',
                'translate'=>true,

                'is_required'=>true
            ],
//            'description_ar'=> [
//                'name'=>'description_ar',
//                'type'=>'text',
//                'is_required'=>true
//            ],

   'parent_id'=> [
                'name'=>'parent_id',
                'type'=>'custom_relation',
                'relation' => [
                    'data' => Category::whereNull('parent_id')->get(),
                    'custom' => function ($Object) {

                        return ($Object) ? (session('my_locale') == 'ar' ? $Object->getName() : $Object->getName()) : '-';
                    },
                    'entity' => 'category'
                ],
                'is_required'=>false
            ],
            'color'=> [
                'name'=>'color',
                'type'=>'color',
                'is_required'=>false
            ],
            
            'image'=> [
                'name'=>'image',
                'type'=>'image',
                'is_required'=>true,
                'is_required_update'=>false
            ],
            'is_active'=> [
                'name'=>'is_active',
                'type'=>'active',
                'is_required'=>true
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

}
