<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Support\Enums\V1\Entities\Entities;
use Modules\Category\Entities\V1\Category\CategoryFields;
use Modules\Category\Enums\V1\CategoryStatus\CategoryStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::Category->table(), function (Blueprint $table)
        {
            $table->id();
            $table->string(CategoryFields::TITLE);
            $table->string(CategoryFields::DESCRIPTION)->nullable();
            $table->string(CategoryFields::SLUG)->nullable();
            $table->text(CategoryFields::IMAGE);
            $table->tinyInteger(CategoryFields::STATUS)->default(CategoryStatus::Active);
            $table->foreignId(CategoryFields::PARENT_ID)
                  ->nullable()
                  ->constrained(Entities::Category->table())
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::Category->table());
    }
};
