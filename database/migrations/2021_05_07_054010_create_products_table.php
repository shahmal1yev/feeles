<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 255);

            $table->unsignedInteger('categoryId');

            $table->decimal('price', 11, 2);

            $table->unsignedInteger('viewCount');
            $table->unsignedInteger('saleCount');

            $table->boolean('online')->default(false);

            $table->dateTime('created')->useCurrent();
            $table->dateTime('updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        Schema::create('product_translations', function(Blueprint $t) {
            $t->increments('id');
            
            $t->unsignedInteger('product_id');
            $t->string('locale')->index();
            
            $t->text('description');

            $t->unique(['product_id', 'locale']);
            $t->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
