<?php


use App\Helpers\Constant;

return [

    'Admin'=>[
        'crud_names' => 'الموظفين',
        'crud_name' => 'موظف',
        'crud_the_name' => 'الموظف',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'is_active' => 'الحالة',
        'avatar' => 'الصورة',
        'shipment_number' => 'رقم الشحنة',
    ],
      'Language' => [
        'crud_names' => 'اللغات',
        'crud_name' => 'اللغة',
        'english_name' => 'اسم',
        'code' => 'كود',
        'is_rtl' => 'is_rtl',
        'is_active' => 'Status',
    ],
    'Customer'=>[
        'crud_names' => 'العملاء',
        'crud_name' => 'عميل',
        'crud_the_name' => 'العميل',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'mobile' => 'رقم الجوال',
        'avatar' => 'الصورة',
        'type' => 'نوع البروفايل',
        'bio' => 'نبذة',
        'balance' => 'الرصيد',
        'country_id' => 'الدولة',
        'city_id' => 'المدينة',
        'address' => 'العنوان',
        'favorite_car' => 'السيارة المفضلة',
        'app_locale' => 'اللغة',
        'is_active' => 'الحالة',
        'created_at' => 'تاريخ الإنشاء',
        'orders_count' => 'عدد الطلبات',
        'Links'=>[
            'active_mobile_email'=>'تفعيل الايميل والجوال'
        ]
    ],
    'Delegate'=>[
        'crud_names' => 'المندوبين',
        'crud_name' => 'مندوب',
        'crud_the_name' => 'المندوب',
        'name' => 'الاسم',
        'email' => 'البريد الالكتروني',
        'mobile' => 'رقم الجوال',
        'avatar' => 'الصورة',
        'type' => 'نوع البروفايل',
        'bio' => 'نبذة',
        'balance' => 'الرصيد',
        'country_id' => 'الدولة',
        'city_id' => 'المدينة',
        'address' => 'العنوان',
        'favorite_car' => 'السيارة المفضلة',
        'app_locale' => 'اللغة',
        'is_active' => 'الحالة',
        'created_at' => 'تاريخ الإنشاء',
        'orders_count' => 'عدد الطلبات',
        'Links'=>[
            'active_mobile_email'=>'تفعيل الايميل والجوال'
        ]
    ],
    'Setting'=>[
        'crud_names' => 'الإعدادات',
        'crud_name' => 'اعداد',
        'crud_the_name' => 'الاعداد',
        'key' => 'الإعداد',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'value' => 'القيمة',
        'value_ar' => 'القيمة عربي',
        'pages'=>'الصفحات الثابته',
        'notifications'=>'الاشعارات',
        'other'=>'اعدادات اخرى'
    ],
    'Faq'=>[
        'crud_names' => 'الأسئلة الشائعة',
        'crud_name' => 'سؤال شائع',
        'crud_the_name' => 'السؤال الشائع',
        'faq_category_id' => 'تصنيف الأسئلة الشائعة',
        'question' => 'السؤال',
        'question_ar' => 'السؤال عربي',
        'answer' => 'الإجابة',
        'answer_ar' => 'الإجابة عربي',
        'is_active' => 'الحالة',
    ],
    'FaqCategory'=>[
        'crud_names' => 'تصنيفات الأسئلة الشائعة',
        'crud_name' => 'تصنيف الأسئلة الشائعة',
        'crud_the_name' => 'التصنيف',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
    ],
    'Ticket'=>[
        'crud_names' => 'التذاكر',
        'crud_name' => 'تذكرة',
        'crud_the_name' => 'التذكرة',
        'id' => '#',
        'user_id' => 'العميل',
        'title' => 'العنوان',
        'message' => 'الرسالة',
        'name' => 'الاسم',
        'email' => 'الايميل',
        'ticket_response' => 'الرد',
        'response_form' => 'الرد على التذكرة',
        'status' => 'الحالة',
        'Statuses'=>[
            ''.\App\Helpers\Constant::TICKETS_STATUS['Open']=>'مفتوحة',
            ''.\App\Helpers\Constant::TICKETS_STATUS['Closed']=>'مغلقة',
        ]
    ],
    'Permission'=>[
        'crud_names' => 'الصلاحيات',
        'crud_name' => 'صلاحية',
        'crud_the_name' => 'الصلاحية',
        'id' => '#',
        'name' => 'الاسم',
    ],
    'Role'=>[
        'crud_names' => 'الأدوار',
        'crud_name' => 'دور',
        'crud_the_name' => 'الدور',
        'id' => '#',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'permissions' => 'الصلاحيات',
    ],
    'Transaction'=>[
        'crud_names' => 'الحركات المالية',
        'crud_name' => 'حركة مالية',
        'crud_the_name' => 'الحركة المالية',
        'user_id' => 'العميل',
        'value' => 'القيمة',
        'type' => 'نوع الحركة',
        'Types' => [
            ''.Constant::TRANSACTION_TYPES['Deposit']=>'إيداع',
            ''.Constant::TRANSACTION_TYPES['Withdraw']=>'سحب',
            ''.Constant::TRANSACTION_TYPES['Holding']=>'معلق',
        ],
        'payment_token' => 'كود الدفع',
        'ref_id' => 'العملية المرتبطة',
        'created_at' => 'التاريخ',
        'status' => 'الحالة',
        'Statuses'=>[
            ''.Constant::TRANSACTION_STATUS['Pending']=>'بالإنتظار',
            ''.Constant::TRANSACTION_STATUS['Paid']=>'مدفوع',
        ]
    ],
    'Category'=>[
        'crud_names' => 'التصنيفات',
        'crud_name' => 'تصنيف',
        'crud_the_name' => 'التصنيف',
        'parent_id' => 'التصنيف الرئيسي',
        'manager_id' => 'المشرف',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'description' => 'الوصف',
        'description_ar' => 'الوصف عربي',
        'image' => 'الصورة',
        'has_product' => 'يسمح بمنتج',
        'has_service' => 'يسمح بخدمة',
        'is_active' => 'الحالة',
    ],
    'Subscription'=>[
        'crud_names' => 'الاشتراكات',
        'crud_name' => 'اشتراك',
        'crud_the_name' => 'الاشتراك',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'description' => 'الوصف',
        'description_ar' => 'الوصف عربي',
        'image' => 'الصورة',
        'price' => 'السعر',
        'is_active' => 'الحالة',
    ],
    'Country'=>[
        'crud_names' => 'الدول',
        'crud_name' => 'دولة',
        'crud_the_name' => 'الدولة',
        'country_code' => 'كود الدولة',
        'name' => 'الاسم',
                'coin_id' => 'العملة',

        'name_ar' => 'الاسم عربي',
        'is_active' => 'الحالة',
    ],
    'City'=>[
        'crud_names' => 'المدن',
        'crud_name' => 'مدينة',
        'crud_the_name' => 'المدينة',
        'country_id' => 'الدولة',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'is_active' => 'الحالة',
    ],
    'Product'=>[
        'crud_names' => 'المنتجات',
        'crud_name' => 'منتج',
        'crud_the_name' => 'المنتج',
        'category_id' => 'التصنيف',
        'name' => 'الاسم',
        'name_ar' => 'الاسم عربي',
        'description' => 'الوصف',
        'description_ar' => 'الوصف عربي',
        'price' => 'السعر',
        'images' => 'الصور',
    ],
    'Advertisement'=>[
        'crud_names' => 'الإعلانات',
        'crud_name' => 'إعلان',
        'crud_the_name' => 'الإعلان',
        'provider_id' => 'المزود',
        'image' => 'الصورة',
        'title' => 'العنوان',
        'title_ar' => 'العنوان عربي',
        'is_active' => 'الحالة',
    ],
    'UserSubscription'=>[
        'crud_names' => 'اشتراكات العميلين',
        'crud_name' => 'اشتراك العميل',
        'crud_the_name' => 'الاشتراك',
        'user_id' => 'العميل',
        'subscription_id' => 'الاشتراك',
        'expire_date' => 'تاريخ الانتهاء',
        'status' => 'الحالة',
        'Statuses' => [
            ''.Constant::USER_SUBSCRIPTION['Pending']=>'جديد',
            ''.Constant::USER_SUBSCRIPTION['Approved']=>'مقبول',
            ''.Constant::USER_SUBSCRIPTION['Rejected']=>'مرفوض',
        ],
    ],
    'Order'=>[
        'crud_names' => 'الطلبات',
        'crud_name' => 'طلب',
        'crud_the_name' => 'الطلب',
        'shipment_number' => 'رقم الشحنة',
        'add'=>'اضافة',
        'Statuses' => [
            ''.Constant::ORDER_STATUSES['New']=>'جديد',
            ''.Constant::ORDER_STATUSES['Accept']=>'مقبول',
            ''.Constant::ORDER_STATUSES['Rejected']=>'مرفوض',
            ''.Constant::ORDER_STATUSES['Canceled']=>'ملغي',
            ''.Constant::ORDER_STATUSES['Finished']=>'منتهي',
            ''.Constant::ORDER_STATUSES['InProgress']=>'قيد التنفيذ',
        ],
        'user_id' => 'العميل',
        'delegate_id' => 'المندوب',
        'status' => 'الحالة',
        'address' => 'العنوان',
        'statuses_history' => 'تاريخ الحالات',
        'amount' => 'السعر',
        'note' => 'الملاحظات',
        'reject_reason' => 'سبب الرفض',
        'cancel_reason' => 'سبب الالغاء',
        'created_at' => 'تاريخ الانشاء',
        'order_date' => 'تاريخ الطلب',
        'order_time' => 'وقت الطلب',
        'accept_order'=>'قبول الطلب',
        'reject_order'=>'رفض الطلب',
        'food_list'=>'قائمة الوجبات',
    ],
];