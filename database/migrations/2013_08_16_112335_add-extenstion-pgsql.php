<?php

use Illuminate\Database\Migrations\Migration;

class AddExtenstionPgsql extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (env('DB_CONNECTION') === 'pgsql') {
            DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (env('DB_CONNECTION') === 'pgsql') {
            DB::statement('DROP EXTENSION IF EXISTS "uuid-ossp";');
        }
    }
}
