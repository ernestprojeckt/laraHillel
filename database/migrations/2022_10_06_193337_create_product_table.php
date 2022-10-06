<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('title')->unique();
            $table->text('description');
            $table->string('short_description', 150)->nullable();
            $table->string('SKU', 35)->unique();
            $table->float('price')->startingValue(1);
            $table->tinyInteger('discount')->unsigned()->nullable()->comment('discount in %');
            $table->unsignedInteger('in_stock')->default(0);
            $table->string('thumbnail'); // image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
