<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_id')->constrained('users'); // Assuming the lecturers are stored in the 'users' table
            $table->string('matricNo', 255)->nullable()->collation('utf8mb4_general_ci');
            $table->text('complaint');
            $table->string('student_name')->nullable();
            $table->timestamps();


            $table->foreign('matricNo')
                ->references('matricNo')
                ->on('students')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notices');
    }
}