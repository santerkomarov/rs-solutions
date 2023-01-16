<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_address');
            $table->string('post_index');
            $table->string('company_phone');
            $table->string('company_email')->unique();
            $table->string('company_bin');
            $table->string('company_iik');
            $table->string('bank_name');
            $table->string('bank_bik');
            $table->string('company_ceo_fio');
            $table->string('responsible_person');
            $table->string('responsible_person_phone');
            $table->string('responsible_person_email');
            $table->string('desired_domen_name');
            $table->string('file');
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
        Schema::dropIfExists('companies');
    }
}
