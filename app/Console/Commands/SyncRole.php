<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class SyncRole extends Command
{
    protected $signature = 'pro:sync-role';

    protected $description = '移除或赋予某个用户角色';

    public function handle()
    {
        $id = (int)$this->ask('请输入用户的 ID');

        $user = User::find($id);

        if (!$user) {
            abort(422, "ID 为 {$id} 的用户不存在");
        }

        $this->comment("ID：{$user->id}，昵称：{$user->nickname}");

        $choices = [
            'assign' => '赋予角色',
            'remove' => '移除角色',
        ];

        $choice = $this->choice('请选择要执行的功能', $choices);

        if ($choice === 'assign') {
            $roles = Role::all()->pluck('display_name', 'name')->toArray();

            $role = $this->choice('请选择要赋予的角色', $roles);

            $user->syncRoles([$role]);

            $this->info("已赋予用户：{$roles[$role]}！");
        } else if ($this->confirm('确定要移除用户所有角色？')) {
            $user->syncRoles([]);

            $this->info('已移除用户所有角色！');
        }
    }
}
