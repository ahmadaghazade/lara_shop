<?php

namespace Modules\Category\Enums\V1\CategoryStatus;

use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum CategoryStatus: int
{
    use CleanEnum;

    case Inactive = 0;
    case Active = 1;
}
