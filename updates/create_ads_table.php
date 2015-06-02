<?php namespace Indikator\Marketing\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateAdsTable extends Migration
{
    public function up()
    {
        Schema::create('marketing_ads', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100);
            $table->string('project_id', 4);
            $table->string('type', 1)->default(1);
            $table->string('location', 100)->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->string('status', 1)->default(1);
            $table->text('text')->nullable();
            $table->text('common')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marketing_ads');
    }
}