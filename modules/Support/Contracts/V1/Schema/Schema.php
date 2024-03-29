<?php

namespace Modules\Support\Contracts\V1\Schema;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;

abstract class Schema
{
    /**
     * Get the current module
     *
     * @return string
     */
    protected static function module(): string
    {
        return str(class_basename(get_called_class()))->replaceLast('Schema', '')->lower()->toString();
    }

    /**
     * Get the current module
     *
     * @return string
     */
    protected static function resource(): string
    {
        return str(class_basename(get_called_class()))->replaceLast('Schema', '')->lower()->toString();
    }

    /**
     * Get the translation keys
     *
     * @return array
     */
    protected static function keys(): array
    {
        return [
            self::module(),
            self::resource()
        ];
    }

    /**
     * Design the form schema
     *
     * @return array
     */
    abstract public static function form(): array;

    /**
     * Design the table schema
     *
     * @return array
     */
    abstract public static function table(): array;

    /**
     * Design the wrapped form schema
     *
     * @return array
     */
    abstract public static function wrappedForm(): array;

    /**
     * Define the table filters
     *
     * @return array
     */
    public static function tableFilters(): array
    {
        return [];
    }

    /**
     * Define the table actions
     *
     * @return array
     */
    public static function tableActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    /**
     * Define the table bulk actions
     *
     * @return array
     */
    public static function tableBulkActions(): array
    {
        return [
            BulkActionGroup::make(
                [
                    DeleteBulkAction::make(),
                ]
            ),
        ];
    }

    /**
     * Define the table relations
     *
     * @return array
     */
    public static function relations(): array
    {
        return [];
    }
}
