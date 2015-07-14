<?php namespace Indikator\Marketing\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class AddImageFieldToTable extends Migration
{
    public function up()
    {
        Schema::table('marketing_clients', function($table)
        {
            $table->string('logo', 200)->nullable();
        });
    }

    public function down()
    {
        Schema::table('marketing_clients', function($table)
        {
            $table->dropColumn('logo');
        });
    }
}
