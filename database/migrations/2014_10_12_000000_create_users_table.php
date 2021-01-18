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
            $table->string('nom');
            $table->string('prenom');
            $table->string('contact')->unique();
            $table->string('email')->unique();
            $table->boolean('email_verified')->default(false);
            $table->string('password');
            $table->boolean('active_profile')->default(false);
            $table->boolean('validate_profile')->default(false);
            $table->string('photo')->nullable();
            $table->string('photo_piece_verso')->nullable();
            $table->string('photo_piece_recto')->nullable();
            $table->double('prix_min')->default(0);
            $table->integer('secteur_id')->nullable();
            $table->integer('typeuser_id')->nullable();
            $table->integer('ville_id')->nullable();
            $table->integer('commune_id')->default(0);
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
        Schema::dropIfExists('users');
    }
}
