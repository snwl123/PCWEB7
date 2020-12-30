<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Resources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('resource_id');
            $table->string('resource_name',100);
            $table->string('resource_type',25);
            $table->string('image')->nullable();
            $table->string('category_name',100);
            $table->unique(['resource_name','resource_type']);
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
