<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
			$table->string('phone')->unique();
			$table->string('address');
			$table->string('gender');
            $table->unsignedBigInteger('city_id');
			$table->unsignedBigInteger('hobby_id');
            $table->string('password');
            $table->rememberToken();
			$table->timestamps();
			
            $table->engine = 'InnoDB';
		});
		
		Schema::table('users', function($table) {
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');;
		});

		Schema::table('users', function($table) {
			$table->foreign('hobby_id')->references('id')->on('hobbies')->onDelete('cascade');;
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
