<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sitename');
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('email')->nullable();
            $table->longtext('description')->nullable();;
            $table->longtext('keywords')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->longtext('message_maintenance')->nullable();
            $table->string('facebook_link', 150);
            $table->string('twitter_link', 150);
            $table->string('linkedin_link', 150);
            $table->string('mobile',12);
            $table->string('adress');

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
        Schema::dropIfExists('settings');
    }
}
