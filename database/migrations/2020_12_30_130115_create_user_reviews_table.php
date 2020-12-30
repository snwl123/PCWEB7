<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->string('track_id', 100);
            $table->tinyInteger('rating');
            $table->text('review_title')->nullable($value = true);
            $table->text('review')->nullable($value = true);
            $table->time('created_at');
            $table->foreign('track_id')->references('track_id')->on('tracks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reviews');
    }
}
