<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->string('logo')->nullable();
            $table->string('featured_image')->nullable();
            $table->text('short_description');
            $table->text('description')->nullable();
            $table->json('features')->nullable();
            $table->json('screenshots')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('product_url')->nullable();
            $table->string('documentation_url')->nullable();
            $table->string('category')->nullable();
            $table->string('platform')->nullable();
            $table->string('version')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
