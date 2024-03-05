<?php

use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;

return [
    'toggle_status' => [
        ToggleStatus::Enabled->name  => 'فعال',
        ToggleStatus::Disabled->name => 'غیرفعال',
        'colors'                     => [
            ToggleStatus::Enabled->name  => 'success',
            ToggleStatus::Disabled->name => 'danger',
        ],
    ],
];
