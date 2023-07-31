<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('street_id')->unsigned();
            $table->string('school');
            $table->string('year');
            $table->string('class');
            $table->string('name');
            $table->string('address');
            $table->timestamps();

            $table->foreign('street_id')
                ->references('id')->on('streets')
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
        Schema::table('requests', function (Blueprint $table) {
            Schema::dropForeign(['requests_street_id_foreign']);
            Schema::drop('requests');
        });
    }
}
