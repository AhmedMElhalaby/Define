<?php

namespace App\Http\Controllers\Admin\AppData;

use App\Http\Controllers\Admin\Controller;
use App\Models\Language;
use App\Traits\AhmedPanelTrait;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_data/languages');
        $this->setEntity(new Language());
        $this->setTable('Languages');
        $this->setLang('Language');
        $this->setColumns([
            'english_name'=> [
                'name'=>'english_name',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],
            'code'=> [
                'name'=>'code',
                'type'=>'text',
                'is_searchable'=>true,
                'order'=>true
            ],

            'is_rtl'=> [
                'name'=>'is_rtl',
                'type'=>'active',
                'is_searchable'=>true,
                'order'=>true
            ],
        ]);
        $this->setFields([
            'english_name'=> [
                'name'=>'english_name',
                'type'=>'text',

                'translate'=>true,

                'is_required'=>true
            ],
            'code'=> [
                'name'=>'code',
                'type'=>'text',
                'is_required'=>true
            ],

            'is_rtl'=> [
                'name'=>'is_rtl',
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
