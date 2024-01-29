<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_student', function (Blueprint $table) {
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->string('matricNo')->collation('utf8mb4_general_ci');
            
            // Add 'status' column to track attendance
            $table->enum('status', ['attend', 'not_attend'])->default('not_attend');

            $table->timestamps();

            // Define composite primary key
            $table->primary(['subject_id', 'matricNo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_student');
    }
}
