<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->enum('time', ['07.30 - 08.00']);
            $table->longText('monday')->nullable();
            $table->longText('tuesday')->nullable();
            $table->longText('wednesday')->nullable();
            $table->longText('thursday')->nullable();
            $table->longText('friday')->nullable();
            $table->longText('saturday')->nullable();
            $table->longText('sunday')->nullable();
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
        Schema::dropIfExists('report');
    }
}
