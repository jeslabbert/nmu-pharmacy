<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('theme_id')->unsigned()->default(1);
//            $table->foreign('theme_id')->references('id')->on('themes');
            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('facebook_username')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('avatar_status')->default(0)->default(false);
//            $table->json('education')->nullable();
            $table->string('sapc_number',13)->unique()->nullable();
            $table->boolean('sapc_active')->default(0)->default(false);
            $table->date('sapc_registration')->nullable();
            $table->string('pssa_number',13)->unique()->nullable();
            $table->boolean('pssa_active')->default(0)->default(false);
            $table->date('pssa_registration')->nullable();
            $table->boolean('internship_completed')->default(0)->default(false);
            $table->boolean('qualified')->default(0)->default(false);
            $table->boolean('working')->default(0)->default(false);
            $table->integer('practice_site_id')->unsigned()->index()->nullable();
            //$table->foreign('practice_site_id')->references('id')->on('practice_sites')->onDelete('cascade');
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
}
