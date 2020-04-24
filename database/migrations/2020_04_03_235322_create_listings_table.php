<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->uuid('key');
            $table->string('title')->index();
            $table->text('body');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('area_id');
            $table->integer('area_parent_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamp('live')->nullable();
            $table->timestamp('expire_at')->nullable();
            $table->string('url')->nullable();
            $table->integer('price')->nullable();
            $table->text('meta')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('listings');
    }
}
