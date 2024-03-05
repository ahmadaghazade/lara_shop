<?php

namespace Modules\Support\Traits\V1\EventableEnum;

trait EventableEnum
{
    /**
     * Call the system event
     */
    public function fire(...$params): void
    {
        event($this->value, $params);
    }
}
