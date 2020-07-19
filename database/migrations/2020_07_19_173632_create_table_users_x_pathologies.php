<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsersXPathologies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_x_pathologies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned()->index();
            $table->foreignId('pathology_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')
                  ->on('users')->onDelete('no action')
                  ->onUpdate('no action');;

            $table->foreign('pathology_id')->references('id')
                ->on('pathologies')->onDelete('no action')
                ->onUpdate('no action');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_x_pathologies');
    }
}
