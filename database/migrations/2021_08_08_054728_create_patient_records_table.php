<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('patient_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('department');
            $table->string('employment_status');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}