<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('ProfileSite');
            $table->string('name');
            $table->string('email');
            $table->string('site_link');
            $table->string('main_picture');
            $table->string('header');
            $table->string('bio');
            $table->string('about_picture');
            $table->text('about_desc');
            $table->string('cv_link');
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
        Schema::dropIfExists('profiles');
    }
};
