<?php

namespace Modules\Support\Enums\V1\SystemEvent;

use Modules\Support\Traits\V1\EventableEnum\EventableEnum;

enum SystemEvent: string
{
    use EventableEnum;

    case NewUserRegistered             = 'new-user-registered';
}
