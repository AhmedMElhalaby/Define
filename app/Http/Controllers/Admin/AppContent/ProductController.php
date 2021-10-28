<?php

namespace App\Http\Controllers\Admin\AppContent;

use App\Helpers\Constant;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\AhmedPanel\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductLogo;
use App\Models\ProductQuantity;
use App\Models\Translation;
use App\Traits\AhmedPanelTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AhmedPanel\UpdateRequest;

class ProductController extends Controller
{
    use AhmedPanelTrait;

    public function setup()
    {
        $this->setRedirect('app_content/products');
        $this->setEntity(new Product());
        $this->setTable('products');
        $this->setLang('Product');
        $this->setViewCreate('Admin/AppContent/ProductColor/create');
        $this->setViewEdit('Admin/AppContent/ProductColor/edit');
        $this->setColumns([
            'category_id' => [
                'name' => 'category_id',
                'type' => 'custom_relation',
                'relation' => [
                    'data' => Category::all(),
                    'custom' => function ($Object) {
                        return ($Object) ? (session('my_locale') == 'ar' ? $Object->getName() : $Object->getName()) : '-';
                    },
                    'entity' => 'category'
                ],
                'is_searchable' => true,
                'order' => true
            ],

            'name' => [
                'name' => 'name',
                'type' => 'text',
                'is_searchable' => true,
                'order' => true
            ],
            'price' => [
                'name' => 'price',
                'type' => 'text',
                'is_searchable' => true,
                'order' => true
            ],
        ]);
        $this->setFields([
            'category_id' => [
                'name' => 'category_id',
                'type' => 'custom_relation',
                'relation' => [
                    'data' => Category::all(),
                    'custom' => function ($Object) {
                        return ($Object) ? (session('my_locale') == 'ar' ? $Object->getName() : $Object->getName()) : '-';
                    },
                    'entity' => 'category'
                ],
                'is_required' => true
            ],
            'name' => [
                'name' => 'name',
                'type' => 'text',
                'translate' => true,

                'is_required' => true
            ],
//            'name_ar' => [
//                'name' => 'name_ar',
//                'type' => 'text',
//                'is_required' => true
//            ],
            'description' => [
                'name' => 'description',
                'type' => 'textarea',
                'translate' => true,
                'editor' => true,

                'is_required' => true
            ],
//            'description_ar' => [
//                'name' => 'description_ar',
//                'type' => 'text',
//                'is_required' => true
//            ],
            'price' => [
                'name' => 'price',
                'type' => 'number',
                'is_required' => true
            ],
            'number_logo' => [
                'name' => 'number_logo',
                'type' => 'number',
                'is_required' => true
            ],
            'images' => [
                'name' => 'images',
                'type' => 'images',
                'media_type' => Constant::MEDIA_TYPE['Product'],
                'entity' => 'media',
                'is_required' => true,
                'is_required_update' => false,
            ],
        ]);
        $this->SetLinks([
            'edit',
            'delete',
        ]);
    }

//     public function update(UpdateRequest $request, $id)
//     {
//         $validator = Validator::make($request->all(), $this->FieldsRules(true, $id));
//         if ($validator->fails()) {
//             return redirect()->back()
//                 ->withErrors($validator)
//                 ->withInput();
//         }
//         Product::updateOrCreate(
//             ['id' => $id],
//             [
//                 'category_id' => $request->category_id,
//                 'name' => $request->name,
//                 'description' => $request->description,
// //                'name_ar' => $request->name_ar,
// //                'description_ar' => $request->description_ar,
//                 'price' => $request->price,
//                 'number_logo' => $request->number_logo
//             ]
//         );

//         foreach ($this->getFields() as $field) {
//             if (isset($field['translate'])) {
//                 $c = $field['name'] . '_translate';
//                 foreach ($request->Language[$field['name']] as $KeyLang => $lang) {
//                     if ($lang != null) {
//                         foreach ($request->$c as $KeyName => $name) {
//                             $Translate = Translation::where('language_id', $lang)->where('column', $field['name'])->where('model_type', $this->getLang())->first();
//                             if ($KeyLang == $KeyName) {
//                                 if ($Translate != null) {
//                                     $translate = Translation::find($Translate->id);
//                                     $translate->language_id = $lang;
//                                     $translate->model_type = $this->getLang();
//                                     $translate->column = $field['name'];
//                                     $translate->translation = $name;
//                                     $translate->save();
//                                 } else {
//                                     Translation::create(
//                                         [
//                                             'language_id' => $lang,
//                                             'model_type' => $this->getLang(),
//                                             'column' => $field['name'],
//                                             'translation' => $name,
//                                             'ref_id' => $id
//                                         ]);
//                                 }
//                             }
//                         }
//                     }
//                 }
//             }
//         }

// //        ProductLogo::where('product_id', $id)->delete();
//         ProductColor::where('product_id', $id)->delete();
//         ProductQuantity::where('product_id', $id)->delete();
// //        if (isset($request->logo))
// //            $this->ProductAttachments($request->logo, $id, 'App\Models\ProductLogo', 'logo');
//         if (isset($request->quantity))
//             $this->ProductAttachments($request->quantity, $id, 'App\Models\ProductQuantity', 'quantity');
//         if (isset($request->color))
//             $this->ProductAttachments($request->color, $id, 'App\Models\ProductColor', 'color');
//         return redirect($this->getRedirect())->with('status', __('admin.messages.saved_successfully'));
//     }

//     public function store(StoreRequest $request)
//     {
//         $validator = Validator::make($request->all(), $this->FieldsRules());
//         if ($validator->fails()) {
//             return redirect()->back()
//                 ->withErrors($validator)
//                 ->withInput();
//         }

//         $Product = Product::create([
//             'category_id' => $request->category_id,
//             'name' => $request->name,
//             'description' => $request->description,
// //            'name_ar' => $request->name_ar,
// //            'description_ar' => $request->description_ar,
//             'price' => $request->price,
//             'number_logo' => $request->number_logo,
//         ]);


//         foreach ($this->getFields() as $field) {
//             if (isset($field['translate'])) {
//                 $c = $field['name'] . '_translate';
//                 $langT = 0;
//                 foreach ($request->Language[$field['name']] as $KeyLang => $lang) {
//                     foreach ($request->$c as $KeyName => $name) {
//                         if ($KeyLang == $KeyName) {
//                                     if ($lang != $langT && $name && $lang ){
//                                 Translation::create([
//                                     'language_id' => $lang,
//                                     'model_type' => $this->getLang(),
//                                     'column' => $field['name'],
//                                     'translation' => $name,
//                                     'ref_id' => $Product->id
//                                 ]);
//                             }

//                         }
//                     }
//                     $langT = $lang;
//                 }
//             }
//         }
// //        $this->ProductAttachments($request->logo, $Product->id, 'App\Models\ProductLogo', 'logo');
//         $this->ProductAttachments($request->quantity, $Product->id, 'App\Models\ProductQuantity', 'quantity');
//         $this->ProductAttachments($request->color, $Product->id, 'App\Models\ProductColor', 'color');
//         return redirect($this->getRedirect())->with('status', __('admin.messages.saved_successfully'));
//     }

    public function ProductAttachments($data, $id, $model, $column)
    {
        if ($data[0] != null) {
            foreach ($data as $k => $v) {
                $models = new $model();
                $models->$column = $v;
                $models->product_id = $id;
                $models->save();
            }
        }
    }
}
