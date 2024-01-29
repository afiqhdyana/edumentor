<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('matricNo', 255)->nullable()->collation('utf8mb4_general_ci'); // Use the same data type and length as in the students table
            $table->string('name');
            $table->date('attendance_date');
            $table->string('status');
            $table->timestamps();

            // Adjust the foreign key reference to use matricNo directly
            $table->foreign('matricNo')
                ->references('matricNo')
                ->on('students')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
