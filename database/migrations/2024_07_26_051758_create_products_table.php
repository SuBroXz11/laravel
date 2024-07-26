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
    public function up()  // this is gonna run if we run the migration
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug'); // url friendly version of the name
            $table->string('description')->nullable();
            $table->decimal('price', 5, 2); // will have the 2 decimal places
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // this is gonna run if we want to rollback
    { 
        Schema::dropIfExists('products');
    }
}
