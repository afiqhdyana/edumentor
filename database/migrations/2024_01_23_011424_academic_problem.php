<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('muet_problem')->nullable()->default(null);
            $table->string('cgpa_problem')->nullable()->default(null);
        });
        
        // Add values to the muet_problem column
        DB::table('students')->update(['muet_problem' => 'MUET_Below_4']);
    
        // Add values to the cgpa_problem column
        DB::table('students')->update(['cgpa_problem' => 'CGPA_Below_3_0']);
    }
    
    


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
