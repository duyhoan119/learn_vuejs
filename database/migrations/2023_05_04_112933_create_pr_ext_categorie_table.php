<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pr_ext_categorie', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('products');

            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')->references('id')->on('pr_ext_categorie');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pr_ext_categorie');
    }
};
