<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_groups', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('group')->nullable();
          $table->string('image')->nullable();
          $table->text('disc')->nullable();
          $table->integer('sort_project')->nullable();
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
        Schema::dropIfExists('services_groups');
    }
}
