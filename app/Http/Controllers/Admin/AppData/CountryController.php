<?php

namespace App\Http\Controllers\Admin\AppData;

use App\Http\Controllers\Admin\Controller;
use App\Models\City;
use App\Models\Coin;
use App\Models\Country;
use App\Traits\AhmedPanelTrait;

class CountryController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_data/countries');
        $this->setEntity(new Country());
        $this->setTable('Countries');
        $this->setLang('Country');
        $this->setColumns([
            'name' => [
                'name' => 'name',
                'type' => 'text',
                'is_searchable' => true,
                'order' => true
            ],

            'country_code' => [
                'name' => 'country_code',
                'type' => 'text',
                'is_searchable' => true,
                'order' => true
            ],
            'coin_id' => [
                'name' => 'coin_id',
                'type' => 'custom_relation',
                'relation' => [
                    'data' => Coin::all(),
                    'custom' => function ($Object) {
                        return $Object ? $Object->getCoinCode() : '-';
                    },
                    'entity' => 'coin'
                ],
                'order' => true,
                'is_searchable' => true,

            ],
            'is_active' => [
                'name' => 'is_active',
                'type' => 'active',
                'is_searchable' => true,
                'order' => true
            ],
        ]);
        $this->setFields([
            'name' => [
                'name' => 'name',
                'type' => 'text',
                'translate' => true,

                'is_required' => true
            ],
//            'name_ar'=> [
//                'name'=>'name_ar',
//                'type'=>'text',
//                'is_required'=>true
//            ],
            'country_code' => [
                'name' => 'country_code',
                'type' => 'text',
                'is_required' => true
            ],
            'coin_id' => [
                'name' => 'coin_id',
                'type' => 'custom_relation',
                'relation' => [
                    'data' => Coin::all(),
                    'custom' => function ($Object) {
                        return $Object->getCoinCode();
                    },
                    'entity' => 'country'
                ],
                'is_required' => false
            ],
            'is_active' => [
                'name' => 'is_active',
                'type' => 'active',
                'is_required' => true
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

}
