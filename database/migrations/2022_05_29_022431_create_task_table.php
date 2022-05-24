<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->enum('time', ['07.30 - 08.00']);
            $table->longText('monday')->nullable();
            $table->longText('tuesday')->nullable();
            $table->longText('wednesday')->nullable();
            $table->longText('thursday')->nullable();
            $table->longText('friday')->nullable();
            $table->longText('saturday')->nullable();
            $table->longText('sunday')->nullable();
            $table->foreignId('project_id')->constrained('project')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->enum('status', ['process', 'cancel']);
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
        Schema::dropIfExists('task');
    }
}
