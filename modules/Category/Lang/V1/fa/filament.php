<?php

use Modules\User\Entities\V1\User\UserFields;
use Modules\Category\Entities\V1\Category\CategoryFields;

return [
    'global' => [
        'placeholder' => ':key را وارد کنید',
        'not_entered' => 'ثبت نشده',
    ],

    'resource' => [
        'category' => [
            'singular' => 'دسته بندی',
            'plural' => 'دسته بندی ها',
        ]
    ],

    'action' => [

    ],

    'category' => [
        CategoryFields::ID => [
            'label' => 'شناسه',
            'placeholder' => ''
        ],
        CategoryFields::TITLE => [
            'label' => 'عنوان',
            'placeholder' => ''
        ],
        CategoryFields::DESCRIPTION => [
            'label' => 'توضیحات',
            'placeholder' => ''
        ],
        CategoryFields::STATUS => [
            'label' => 'وضعیت',
            'placeholder' => ''
        ],
        CategoryFields::IMAGE => [
            'label' => 'تصویر',
            'placeholder' => ''
        ],
        CategoryFields::SLUG => [
            'label' => 'اسلاگ',
            'placeholder' => ''
        ],
        CategoryFields::PARENT_ID => [
            'label' => 'آیدی والد',
            'placeholder' => ''
        ],
    ],
];
