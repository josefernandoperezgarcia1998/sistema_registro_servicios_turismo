<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_service')->nullable();
            $table->string('personal_name')->nullable();
            $table->string('date_start_service')->nullable();
            $table->string('person_served');
            $table->string('area');
            $table->string('type_service');
            $table->string('description');
            $table->string('date_end_service')->nullable();
            $table->foreignId('personal_id')->references('id')->on('users');
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
        Schema::dropIfExists('services');
    }
}
