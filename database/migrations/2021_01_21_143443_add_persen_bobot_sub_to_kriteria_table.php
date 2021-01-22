<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersenBobotSubToKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kriteria', function (Blueprint $table) {
            $table->decimal('persen_bobot_sub', 6, 4)->after('bobot_utama')->default(1);
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
