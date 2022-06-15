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
            $table->string('project');
            // $table->boolean('monday')->nullable();
            // $table->boolean('tuesday')->nullable();
            // $table->boolean('wednesday')->nullable();
            // $table->boolean('thursday')->nullable();
            // $table->boolean('friday')->nullable();
            // $table->boolean('saturday')->nullable();
            // $table->boolean('sunday')->nullable();
            $table->enum('day', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('start_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['Done', 'On Progress', 'Need Update', 'Open', 'Not Required'])->default('Open');
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
