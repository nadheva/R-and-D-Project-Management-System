<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('model')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('item_id')->constrained('item')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->json('sub_item_id')->nullable();
            $table->text('remark')->nullable();
            $table->enum('status', ['Done', 'On Progress', 'Need Update', 'Open', 'Not Required']);
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
        Schema::dropIfExists('project');
    }
}
