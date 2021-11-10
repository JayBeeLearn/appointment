<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->Integer('profile_id')->nullable();
            $table->string('name');
            $table->string('appointment_topic');
            $table->string('appointment_details');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        
            
            
        });
    } 
    
//     {
//     Schema::create('appointments', function (Blueprint $table) {
//         $table->increments('id');
//         $table->string('name');
//         $table->string('appointment_topic');
//         $table->string('appointment_details');
//         $table->date('date');
//         $table->time('time');
//         $table->timestamps();
//         $table->foreign('user_id')
//         ->on('user')
//         ->references('id')
//             ->onDelete('cascade');
//     });
// }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
