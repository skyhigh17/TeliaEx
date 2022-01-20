<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ekraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ekraan', function (Blueprint $table) {
            $table->id();
            $table->mediumText('Name');
            $table->mediumText('Language');
            $table->mediumText('url');
            $table->integer('active_vaade_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ekraan');
    }
}
