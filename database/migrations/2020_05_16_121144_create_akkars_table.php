<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkkarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akkars', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bu_name', 100);
            $table->string('bu_price', 20);
            $table->integer('bu_rooms_count');
            $table->boolean('bu_rent');
            $table->string('bu_square','10000');
            $table->boolean('bu_type');
            $table->string('bu_small_desc', 160);
            $table->string('bu_meta', 200);
            $table->string('bu_place',30);
            $table->string('bu_langtituide', 70);
            $table->string('bu_latituide', 70);
            $table->longText('bu_large_desc');
            $table->boolean('bu_status')->default(0);

            $table->string('image')->nullable()->default('website/bu_image/default.png');

            $table->integer('user_id')->unsigned();

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
        Schema::dropIfExists('akkars');
    }
}
