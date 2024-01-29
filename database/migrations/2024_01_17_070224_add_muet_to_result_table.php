<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->integer('muet')->nullable();
        });
    }

    public function down()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->dropColumn('muet');
        });
    }
};