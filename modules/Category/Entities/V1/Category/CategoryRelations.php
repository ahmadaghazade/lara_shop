<?php

namespace Modules\Category\Entities\V1\Category;

use Cviebrock\EloquentSluggable\Sluggable;

trait CategoryRelations
{
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
