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
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Table;

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
                     ->translateLabel(),
            TextInput::make(CategoryFields::DESCRIPTION)
                     ->translateLabel(),
            FileUpload::make(CategoryFields::IMAGE)
                      ->translateLabel(),
            Toggle::make(CategoryFields::STATUS)->translateLabel(),


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
                      ->sortable()
                      ->translateLabel()
                      ->searchable(),

            TextColumn::make(CategoryFields::TITLE)
                      ->translateLabel()
                      ->searchable(),

            TextColumn::make(CategoryFields::SLUG)
                      ->searchable(),

            TextColumn::make(CategoryFields::DESCRIPTION)
                      ->searchable(),

            ImageColumn::make(CategoryFields::IMAGE),

            TextColumn::make(CategoryFields::PARENT_ID),

            ToggleColumn::make(CategoryFields::STATUS),
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
