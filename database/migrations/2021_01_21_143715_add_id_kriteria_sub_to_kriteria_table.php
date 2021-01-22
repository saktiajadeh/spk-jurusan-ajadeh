<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdKriteriaSubToKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kriteria', function (Blueprint $table) {
            $table->integer('id_kriteria_sub')->after('persen_bobot_sub')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kriteria', function (Blueprint $table) {
            //
        });
    }
}
