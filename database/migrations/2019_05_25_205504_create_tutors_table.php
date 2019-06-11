<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('email');
            
            $table->string('name');
            $table->text('about')->nullable();
            $table->string('avatar')->nullable()->default(null);
            $table->string('address')->nullable();
            $table->string('city')->nullable();

            $table->enum('gender', ['m', 'f']);
            $table->tinyInteger('age');
            $table->unsignedInteger('likes')->default(0);
            $table->unsignedInteger('dislikes')->default(0);            
            $table->unsignedInteger('hireCount')->default(0);

            $table->string('phone')->nullable();
            $table->text('education')->nullable();
            $table->text('subject')->nullable();
            $table->text('experience')->nullable();


            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('tutors');
    }
}