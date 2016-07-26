<?php namespace Indikator\Marketing\Updates;

use Schema;
use DbDongle;
use October\Rain\Database\Updates\Migration;

class UpdateTimestampsNullable extends Migration
{
    public function up()
    {
        DbDongle::disableStrictMode();

        DbDongle::convertTimestamps('marketing_ads');
        DbDongle::convertTimestamps('marketing_clients');
        DbDongle::convertTimestamps('marketing_posts');
        DbDongle::convertTimestamps('marketing_projects');
        DbDongle::convertTimestamps('marketing_tasks');
    }

    public function down()
    {
        // ...
    }
}
