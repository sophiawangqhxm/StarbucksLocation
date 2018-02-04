<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarbucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starbucks', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name',100);
            $table->string('street',100);
            $table->string('city',30);
            $table->decimal('lat',2,6);
            $table->string('lng',3,6);
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
        Schema::dropIfExists('starbucks');
    }
}
