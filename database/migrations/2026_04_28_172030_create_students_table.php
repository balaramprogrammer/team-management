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
    Schema::create('students', function (Blueprint $table) {

        $table->id();

        // किस team leader/admin के under student है
        $table->foreignId('leader_id')->nullable()->constrained('users')->onDelete('set null');

        $table->string('student_name');

        $table->string('father_name')->nullable();

        $table->string('email')->nullable();

        $table->string('mobile',20);

        $table->date('dob')->nullable();

        $table->enum('gender',
            ['Male','Female','Other']
        )->nullable();

        $table->text('address')->nullable();

        $table->string('course')->nullable();

        $table->string('batch')->nullable();

        $table->date('admission_date')->nullable();

        $table->decimal('fees',10,2)
              ->nullable();

        $table->enum('status',
            ['Active','Inactive'])
            ->default('Active');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
