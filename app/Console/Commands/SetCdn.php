<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetCdn extends Command
{
    protected $signature = 'pro:set-cdn';

    protected $description = '设置 CDN 链接';

    public function handle()
    {
        $cdn = $this->ask('请输入 CDN 链接', config('app.cdn'));

        $laravel_env = base_path('.env');

        file_put_contents($laravel_env, preg_replace(
            '/^MIX_APP_CDN=.*/m',
            "MIX_APP_CDN={$cdn}",
            file_get_contents($laravel_env)
        ));

        $sass_env = base_path('resources/assets/sass/_env.scss');

        file_put_contents($sass_env, preg_replace(
            '/^\$cdn:.*/m',
            "\$cdn: '{$cdn}';",
            file_get_contents($sass_env)
        ));

        $this->info("CDN [$cdn] set successfully.");

        $this->info(PHP_EOL . "Don't forget to run `npm run dev` or `npm run prod`.");
    }
}
