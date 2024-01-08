<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
//            $table->tinyInteger('user_type');
//            $table->string('admission_number')->nullable();
//            $table->string('roll_number')->nullable();
//            $table->integer('class_id')->nullable();
//            $table->string('gender')->nullable();
//            $table->timestamps('date_of_birth')->nullable();
//            $table->string('relligion')->nullable();
//            $table->string('mobile')->nullable();
//            $table->timestamp('admission_date')->nullable();
//            $table->string('profile_pic')->nullable();
//            $table->string('blood_group')->nullable();
//            $table->string('height')->nullable();
//            $table->string('weight')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
