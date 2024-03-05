<?php

namespace Modules\Category\Entities\V1\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;

class Category extends BaseModel
{
    use HasFactory,
        CategoryModifiers,
        CategoryRelations,
        CategoryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        CategoryFields::ID,
        CategoryFields::TITLE,
        CategoryFields::DESCRIPTION,
        CategoryFields::STATUS,
        CategoryFields::IMAGE,
        CategoryFields::SLUG,
        CategoryFields::PARENT_ID,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        #CategoryFields::CREATED_AT => 'datetime',
    ];
}
