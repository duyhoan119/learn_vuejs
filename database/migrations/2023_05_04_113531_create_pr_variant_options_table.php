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
        Schema::create('pr_variant_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pr_variant_id');
            $table->foreign('pr_variant_id')->references('id')->on('pr_variants');
            $table->string('name');
            $table->string('sku');
            $table->float('price',15,2);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pr_variant_options');
    }
};
