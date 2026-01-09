<?php

use Illuminate\Database\Migrations\Migration;
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
        if (DB::getDriverName() === 'pgsql') {
            $maxId = DB::table('product_inventory_indices')->max('id');
            if ($maxId) {
                DB::statement('SELECT setval(\'product_inventory_indices_id_seq\', ?)', [$maxId]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // This migration cannot be easily reversed.
    }
};
