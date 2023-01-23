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
            $table->id();
            $table->string('logo')->nullable();
            $table->string('header_video')->nullable();
            $table->text('footer')->nullable();
            $table->text('copy_right')->nullable();
            $table->text('mobile_no')->nullable();
            $table->text('email')->nullable();
            $table->text('address')->nullable();
            $table->text('Schedule')->nullable();
            $table->text('who_are')->nullable();
            $table->text('our_vision')->nullable();
            $table->text('our_history')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
