<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("city");
            $table->string("email");
            $table->string("contact");
            $table->string("source");
            $table->string("campaign");
            $table->string("adgroup");
            $table->string("status");
            $table->string("keyword");
            $table->string("data");
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
         Schema::drop('leads');
    }
}
