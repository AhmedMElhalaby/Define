<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use League\CommonMark\Inline\Element\Link;

class Language extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $languages = [[

            'english_name' => 'Danish',
            'code' => 'da',
            'is_rtl' => '0',
        ], [

                'english_name' => 'English',
                'code' => 'en',
                'is_rtl' => '0',
            ]
            , [
                'english_name' => 'Arabic',
                'code' => 'ar',
                'is_rtl' => '1',
            ], [
                'english_name' => 'Norwegian',
                'code' => 'nb',
                'is_rtl' => '0',
            ], [
                'english_name' => 'Swedish',
                'code' => 'sv',
                'is_rtl' => '0',
            ], [
                'english_name' => 'Turkic',
                'code' => 'tr',
                'is_rtl' => '0',
            ]
        ];
        foreach($languages as $language){
            \App\Models\Language::create($language);
        }
    }
}
