<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('model')->onUpdate('cascade')->onDelete('cascade');
            $table->string('issue');
            $table->text('detail');
            $table->text('action');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('due_date');
            // $table->string('status');
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
        Schema::dropIfExists('rio');
    }
}
