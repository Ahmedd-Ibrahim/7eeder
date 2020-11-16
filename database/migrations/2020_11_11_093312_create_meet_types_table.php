<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetTypesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meet_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('meet_type');
            $table->date('slaughter_date');
            $table->integer('age');
            $table->bigInteger('store_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('meet_types', function (Blueprint $table) {
           $table->foreign('store_id')
               ->on('stores')
               ->references('id')
               ->onUpdate('cascade')
               ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meet_types');
    }
}
