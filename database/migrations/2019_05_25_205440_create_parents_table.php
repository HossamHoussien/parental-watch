<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
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
            $table->string('phone')->nullable();
            $table->string('ssn')->nullable();
            $table->string('bank_account')->nullable();
            $table->unsignedTinyInteger('noKids')->nullable();



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
        Schema::dropIfExists('parents');
    }
}