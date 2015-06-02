<?php namespace Indikator\Marketing\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('marketing_posts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 100);
            $table->string('url', 100);
            $table->string('project_id', 4);
            $table->string('lang', 2)->default('en');
            $table->string('feedback', 1)->default(0);
            $table->string('status', 1)->default(1);
            $table->text('comment')->nullable();
            $table->text('common')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marketing_posts');
    }
}
