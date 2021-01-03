<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('resource_id');
            $table->string('title',100);
            $table->string('author',100);
            $table->string('description',500)->nullable();
            $table->date('publication_date')->nullable();
            $table->string('resource_type',25);
            $table->string('image')->nullable();
            $table->string('category_name',100);
            $table->string('price',10);
            $table->unsignedBigInteger('uploaded_by');
            $table->time('created_at');
            $table->unique(['title','author','publication_date','resource_type']);
            $table->foreign('uploaded_by')->references('id')->on('users');
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
