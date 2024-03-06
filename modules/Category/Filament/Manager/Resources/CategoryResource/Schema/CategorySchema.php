<?php

namespace Modules\Category\Filament\Manager\Resources\CategoryResource\Schema;

use Filament\Forms\Components\Section;
use Modules\Support\Contracts\V1\Schema\Schema;
use Filament\Tables\Columns\TextColumn;
use Modules\Category\Entities\V1\Category\CategoryFields;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;

class CategorySchema extends Schema
{
    /**
     * Design the form schema
     *
     * @return array
     */
    public static function form(): array
    {
        return [
            TextInput::make(CategoryFields::TITLE)
                     ->modularTranslate(...self::keys()),
            TextInput::make(CategoryFields::DESCRIPTION)
                     ->modularTranslate(...self::keys()),
            FileUpload::make(CategoryFields::IMAGE)
                      ->modularTranslate(...self::keys()),
            Toggle::make(CategoryFields::STATUS)
                  ->modularTranslate(...self::keys()),
        ];
    }

    /**
     * Design the table schema
     *
     * @return array
     */
    public static function table(): array
    {
        return [
            TextColumn::make(CategoryFields::ID)
                      ->modularLabel(...self::keys())
                      ->sortable()
                      ->searchable(),
            TextColumn::make(CategoryFields::TITLE)
                      ->searchable()
                      ->modularLabel(...self::keys()),

            TextColumn::make(CategoryFields::SLUG)
                      ->searchable()
                      ->modularLabel(...self::keys()),

            TextColumn::make(CategoryFields::DESCRIPTION)
                      ->searchable()
                      ->modularLabel(...self::keys()),

            ImageColumn::make(CategoryFields::IMAGE)
                       ->modularLabel(...self::keys()),

            TextColumn::make(CategoryFields::PARENT_ID)
                      ->modularLabel(...self::keys())
                      ->sortable(),

            ToggleColumn::make(CategoryFields::STATUS)
                        ->modularLabel(...self::keys()),
        ];
    }


    /**
     * Design the wrapped form schema
     *
     * @return array
     */
    public static function wrappedForm(): array
    {
        return [
            Section::make()
                   ->columns()
                   ->schema(self::form()),
        ];
    }
}
