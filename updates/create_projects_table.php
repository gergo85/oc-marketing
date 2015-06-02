<?php namespace Indikator\Marketing\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('marketing_projects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100);
            $table->string('client_id', 4)->default(0);
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->text('task')->nullable();
            $table->text('goal')->nullable();
            $table->string('user_id', 4)->default(1);
            $table->string('status', 1)->default(1);
            $table->text('common')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marketing_projects');
    }
}
