<?php namespace Indikator\Marketing\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('marketing_clients', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100);
            $table->string('address', 100);
            $table->string('contact_name', 50)->nullable();
            $table->string('contact_assignment', 50)->nullable();
            $table->string('contact_tel', 50)->nullable();
            $table->string('contact_email', 50)->nullable();
            $table->text('common')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marketing_clients');
    }
}
