<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->integer('sort_id');
            $table->string('route_name',255)->unique();
            $table->string('man_name',255);
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->timestamps();
        });

        Schema::create('users_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('role_id');
            $table->timestamps();
        });

        Schema::create('roles_permessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->integer('permession_id');
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
        Schema::drop('permessions');
        Schema::drop('roles');
        Schema::drop('users_roles');
        Schema::drop('roles_permessions');
    }
}
