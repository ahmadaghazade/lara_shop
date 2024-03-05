<?php

namespace Modules\Category\Entities\V1\Category;

use Modules\Base\Entities\V1\Fields\BaseFields\BaseFields;

class CategoryFields extends BaseFields
{
    public const ID = 'id';
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const SLUG = 'slug';
    public const STATUS = 'status';
    public const IMAGE = 'image';
    public const PARENT_ID = 'parent_id';
}
