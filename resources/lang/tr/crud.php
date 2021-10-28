<?php

use App\Helpers\Constant;

return [
    'Admin' => [
        'crud_names' => 'Medarbejdere',
        'crud_name' => 'Medarbejder',
        'crud_the_name' => 'Medarbejderen',
        'name' => 'Navn',
        'email' => 'E-mail',
        'is_active' => 'Status',
        'avatar' => 'Avatar',
    ],
    'Kunde' => [
        'crud_names' => 'Kunder',
        'crud_name' => 'Kunde',
        'crud_the_name' => 'Kunden',
        'name' => 'Navn',
        'email' => 'E-mail',
        'mobile' => 'Mobil',
        'avatar' => 'Avatar',
        'type' => 'Type',
        'bio' => 'Bio',
        'country_id' => 'Land',
        'city_id' => 'By',
        'address' => 'Adresse',
        'balance' => 'balance',
        'favorite_car' => 'Favoritbil',
        'app_locale' => 'App -landestandard',
        'is_active' => 'Status',
        'created_at' => 'Oprettet kl',
        'orders_count' => 'Ordrer tæller',
        'Links' => [
            'active_mobile_email' => 'Aktiv mobil og e -mail'
        ]
    ],
    'Delegate' => [
        'crud_names' => 'Delegerede',
        'crud_name' => 'Delegeret',
        'crud_the_name' => 'Delegaten',
        'name' => 'Navn',
        'email' => 'E-mail',
        'mobile' => 'Mobil',
        'avatar' => 'Avatar',
        'type' => 'Type',
        'bio' => 'Bio',
        'country_id' => 'Land',
        'city_id' => 'By',
        'address' => 'Adresse',
        'balance' => 'balance',
        'favorite_car' => 'Favoritbil',
        'app_locale' => 'App -landestandard',
        'is_active' => 'Status',
        'created_at' => 'Oprettet kl',
        'orders_count' => 'Ordrer tæller',
        'Links' => [
            'active_mobile_email' => 'Aktiv mobil og e -mail'
        ]
    ],

    'Setting' => [
        'crud_names' => 'Indstillinger',
        'crud_name' => 'Indstilling',
        'crud_the_name' => 'Indstillingen',
        'key' => 'Nøgle',
        'name' => 'Navn',
        'name_ar' => 'Navn Ar',
        'value' => 'Værdi',
        'value_ar' => 'Værdi Ar',
        'sider' => 'Sider',
        'notifications' => 'Meddelelser',
        'other' => 'Andre indstillinger'
    ],
    'FAQ' => [
        'crud_names' => 'Ofte stillede spørgsmål',
        'crud_name' => 'Ofte stillede spørgsmål',
        'crud_the_name' => 'Ofte stillede spørgsmål',
        'question' => 'Spørgsmål',
        'question_ar' => 'Spørgsmål Ar',
        'faq_category_id' => 'Ofte stillede spørgsmål',
        'answer' => 'Svar',
        'answer_ar' => 'Svar Ar',
        'is_active' => 'Status',
    ],
    'FaqCategory' => [
        'crud_names' => 'Ofte stillede spørgsmål',
        'crud_name' => 'Ofte stillede spørgsmål',
        'crud_the_name' => 'Ofte stillede spørgsmål',
        'name' => 'Navn',
        'name_ar' => 'Navn Ar',
    ],
    'Ticket' => [
        'crud_names' => 'Billetter',
        'crud_name' => 'Billet',
        'crud_the_name' => 'Billetten',
        'id' => '#',
        'user_id' => 'Kunde',
        'title' => 'Titel',
        'name' => 'Navn',
        'email' => 'E -mail',
        'message' => 'Besked',
        'ticket_response' => 'Svar',
        'status' => 'Status',
        'response_form' => 'Svar på billetten',
        'Statuses'=>[
            ''.\App\Helpers\Constant::TICKETS_STATUS['Open']=>'Opened',
            ''.\App\Helpers\Constant::TICKETS_STATUS['Closed']=>'Closed',
        ]
    ],
    'Permission' => [
        'crud_names' => 'Tilladelser',
        'crud_name' => 'Tilladelse',
        'crud_the_name' => 'Tilladelsen',
        'id' => '#',
        'name' => 'Navn',
    ],
    'Role' => [
        'crud_names' => 'Roller',
        'crud_name' => 'Rolle',
        'crud_the_name' => 'Rollen',
        'id' => '#',
        'name' => 'Navn',
        'name_ar' => 'Navn Ar',
        'permissions' => 'Tilladelser',
    ],
    'Transaktion' => [
        'crud_names' => 'Transaktioner',
        'crud_name' => 'Transaktion',
        'crud_the_name' => 'Transaktionen',
        'user_id' => 'Bruger',
        'value' => 'Værdi',
        'type' => 'Type',
        'Types' => [
            ''.Constant::TRANSACTION_TYPES['Deposit']=>'Deposit',
            ''.Constant::TRANSACTION_TYPES['Withdraw']=>'Withdraw',
            ''.Constant::TRANSACTION_TYPES['Holding']=>'Hold',
        ],
        'payment_token' => 'Betalingstoken',
        'ref_id' => 'Referencer',
        'created_at' => 'Dato',
        'status' => 'Status',
        'Statuses'=>[
            ''.Constant::TRANSACTION_STATUS['Pending']=>'Pending',
            ''.Constant::TRANSACTION_STATUS['Paid']=>'Paid',
        ]
    ],
    'Category' => [
        'crud_names' => 'Kategorier',
        'crud_name' => 'Kategori',
        'crud_the_name' => 'Kategorien',
        'parent_id' => 'Forældrekategori',
        'manager_id' => 'Manager',
        'name' => 'Navn',
        'name_ar' => 'Navn Ar',
        'description' => 'Beskrivelse',
        'description_ar' => 'Beskrivelse Ar',
        'image' => 'Billede',
        'has_product' => 'Har produkt',
        'has_service' => 'Har service',
        'is_active' => 'Status',
    ],
    'Abonnement' => [
        'crud_names' => 'Abonnementer',
        'crud_name' => 'Abonnement',
        'crud_the_name' => 'Abonnementet',
        'name' => 'Navn',
        'name_ar' => 'Navn Ar',
        'description' => 'Beskrivelse',
        'description_ar' => 'Beskrivelse Ar',
        'image' => 'Billede',
        'price' => 'Pris',
        'is_active' => 'Status',
    ],
    'Land' => [
        'crud_names' => 'Lande',
        'crud_name' => 'Land',
        'crud_the_name' => 'Landet',
        'country_code' => 'Landekode',
        'name' => 'Navn',
        'name_ar' => 'Navn Ar',
        'is_active' => 'Status',
    ],
     'Country'=>[
        'crud_names' => 'Countries',
        'crud_name' => 'Country',
        'crud_the_name' => 'The Country',
        'country_code' => 'Country Code',
        'name' => 'Name',
        'name_ar' => 'Name Ar',
                'coin_id' => 'coin',

        'is_active' => 'Status',
    ],
    'City' => [
        'crud_names' => 'Byer',
        'crud_name' => 'By',
        'crud_the_name' => 'Byen',
        'country_id' => 'Land',
        'name' => 'Navn',
        'name_ar' => 'Navn Ar',
        'is_active' => 'Status',
    ],
    'Mad' => [
        'crud_names' => 'Produkter',
        'crud_name' => 'Produkt',
        'crud_the_name' => 'Produktet',
        'category_id' => 'Kategori',
        'name' => 'Navn',
        'name_ar' => 'Navn Ar',
        'description' => 'Beskrivelse',
        'description_ar' => 'Beskrivelse Ar',
        'price' => 'Pris',
        'images' => 'Billeder',
    ],
    'Annonce' => [
        'crud_names' => 'Annoncer',
        'crud_name' => 'Annonce',
        'crud_the_name' => 'Annoncen',
        'image' => 'Billede',
        'title' => 'Titel',
        'title_ar' => 'Titel Ar',
        'is_active' => 'Status',
    ],
    'UserSubscription' => [
        'crud_names' => 'Brugerabonnementer',
        'crud_name' => 'Brugerabonnement',
        'crud_the_name' => 'Brugerabonnementet',
        'user_id' => 'Bruger',
        'subscription_id' => 'Abonnement',
        'expire_date' => 'Udløbsdato',
        'status' => 'Status',
        'Statuses' => [
            ''.Constant::USER_SUBSCRIPTION['Pending']=>'Pending',
            ''.Constant::USER_SUBSCRIPTION['Approved']=>'Approved',
            ''.Constant::USER_SUBSCRIPTION['Rejected']=>'Rejected',
        ],
    ],
    'Order' => [
        'crud_names' => 'Ordrer',
        'crud_name' => 'Bestilling',
        'crud_the_name' => 'Ordren',
        'Statuses' => [
            ''.Constant::ORDER_STATUSES['New']=>'New',
            ''.Constant::ORDER_STATUSES['Accept']=>'Accept',
            ''.Constant::ORDER_STATUSES['Rejected']=>'Rejected',
            ''.Constant::ORDER_STATUSES['Canceled']=>'Cancelled',
            ''.Constant::ORDER_STATUSES['Finished']=>'Finished',
            ''.Constant::ORDER_STATUSES['InProgress']=>'In Progress',
        ],
        'Language' => [
            'crud_names' => 'Languages',
            'crud_name' => 'Language',
            'english_name' => 'Name',
            'image' => 'Image',
            'code' => 'Code',
            'is_rtl' => 'is_rtl',
            'is_active' => 'Status',
        ],
        'user_id' => 'Kunde',
        'delegate_id' => 'Levering',
        'status' => 'Status',
        'statuses_history' => 'Statusser historie',
        'amount' => 'Beløb',
        'note' => 'Bemærk',
        'address' => 'Adresse',
        'reject_reason' => 'Afvis årsag',
        'cancel_reason' => 'Annuller årsag',
        'created_at' => 'Oprettet dato',
        'order_date' => 'Bestillingsdato',
        'order_time' => 'Bestillingstid',
        'accept_order' => 'Accepter ordre',
        'reject_order' => 'Afvis ordre',
        'food_list' => 'Madliste',
    ],
    
        'Language' => [
        'crud_names' => 'Sprog',
        'crud_name' => 'Sprog',
        'english_name' => 'Navn',
        'image' => 'Billede',
        'code' => 'Kode',
        'is_rtl' => 'er_rtl',
        'is_active' => 'Status',
    ],
];
