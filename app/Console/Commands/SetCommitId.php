<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetCommitId extends Command
{
    protected $signature = 'pro:set-commit-id';

    protected $description = '使用 Git 最近一次提交的 commit id 作为前端资源缓存键';

    public function handle()
    {
        $commit_id = exec('git rev-parse --short HEAD');

        $laravel_env = base_path('.env');

        file_put_contents($laravel_env, preg_replace(
            '/^MIX_COMMIT_ID=.*/m',
            "MIX_COMMIT_ID={$commit_id}",
            file_get_contents($laravel_env)
        ));

        $sass_env = base_path('resources/assets/sass/_env.scss');

        file_put_contents($sass_env, preg_replace(
            '/^\$commit\-id:.*/m',
            "\$commit-id: '{$commit_id}';",
            file_get_contents($sass_env)
        ));

        $this->info("Commit id [$commit_id] set successfully.");

        $this->info(PHP_EOL . "Don't forget to run `npm run dev` or `npm run prod`.");
    }
}
