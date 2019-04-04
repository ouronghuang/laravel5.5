<?php

use App\Models\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedConfigsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [
                'name' => 'site_name',
                'display_name' => '站点名称',
                'value' => '站点名称',
            ],
            [
                'name' => 'seo_description',
                'display_name' => 'SEO 描述',
                'value' => 'SEO 描述',
            ],
            [
                'name' => 'seo_keyword',
                'display_name' => 'SEO 关键字',
                'value' => 'SEO 关键字',
            ],
        ];

        foreach ($data as $datum) {
            Config::create($datum);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Config::query()->delete();
    }
}
