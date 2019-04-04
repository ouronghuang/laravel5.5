# 部署项目

1. 克隆源代码

```
git clone git@github.com:ouronghuang/laravel5.5.git
```

2. 安装扩展包依赖

```
composer install
```

3. 生成配置文件

```
cp .env.example .env

cp resources/assets/sass/_env.scss.example resources/assets/sass/_env.scss
```

4. 生成应用秘钥

```
php artisan key:generate
```

5. 数据库迁移

```
php artisan migrate
```

6. 安装前端依赖

```
yarn
```

7. 生成前端资源文件

```
npm run dev
```

# 更新项目

1. 更新开发环境代码

```
make update-local
```

2. 更新生产环境代码

```
make update-production
```

# 提交代码

1. 拉取最新代码

```
git pull
```

2. 添加所有文件到暂存区

```
git add -A
```

3. 提交到版本库

```
git commit -m "本次提交说明"
```

4. 推送到主仓库

```
git push
```
