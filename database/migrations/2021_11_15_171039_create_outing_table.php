<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Date('date')->require();
            $table->string('year');
            $table->string('course');
            $table->string('section');
            $table->string('contact')->require();
            $table->string('reason')->require();
            $table->string('outing_duration')->require();
            $table->string('status');
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
        Schema::dropIfExists('outing');
    }
}
