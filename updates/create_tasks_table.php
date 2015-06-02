<?php namespace Indikator\Marketing\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('marketing_tasks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100);
            $table->string('project_id', 4)->default(0);
            $table->timestamp('deadline');
            $table->string('priority', 1)->default(2);
            $table->string('status', 1)->default(1);
            $table->string('user_id', 4)->default(1);
            $table->text('description')->nullable();
            $table->text('common')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marketing_tasks');
    }
}
