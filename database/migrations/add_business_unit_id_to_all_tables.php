<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddBusinessUnitIdToAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = $this->getAllTables();

        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                Schema::table($table, function (Blueprint $table) use ($table) {
                    if (!Schema::hasColumn($table, 'business_unit_id')) {
                        $table->unsignedBigInteger('business_unit_id')->nullable()->after('id');
                        $table->foreign('business_unit_id')->references('id')->on('business_units')->onDelete('set null');
                    }
                });
            }
        }
    }

    /**
     * Get a list of all tables in the database.
     *
     * @return array
     */
    protected function getAllTables()
    {
        $connection = config('database.default');
        $schema = DB::getDoctrineSchemaManager();
        $tables = $schema->listTableNames();
        return $tables;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tables = $this->getAllTables();

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'business_unit_id')) {
                Schema::table($table, function (Blueprint $table) {
                    $table->dropForeign(['business_unit_id']);
                    $table->dropColumn('business_unit_id');
                });
            }
        }
    }
}
