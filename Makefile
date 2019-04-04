#  ____            _                      _   _              ___  ____  _   _
# |  _ \  ___  ___(_) __ _ _ __   ___  __| | | |__  _   _   / _ \|  _ \| | | |
# | | | |/ _ \/ __| |/ _` | '_ \ / _ \/ _` | | '_ \| | | | | | | | |_) | |_| |
# | |_| |  __/\__ \ | (_| | | | |  __/ (_| | | |_) | |_| | | |_| |  _ <|  _  |
# |____/ \___||___/_|\__, |_| |_|\___|\__,_| |_.__/ \__, |  \___/|_| \_\_| |_|
#                    |___/                          |___/

.PHONY: help

# 操作说明
help:
	@echo '===================== 操作说明 ====================='
	@echo '>=== `make update-local`      - 更新开发环境代码 ===<'
	@echo '>=== `make update-production` - 更新生产环境代码 ===<'

# 更新开发环境代码
update-local:
	@echo '--------------- 清除类映射加载优化 ---------------'
	php artisan clear-compiled

	@echo '--------------- 清除路由缓存 ---------------'
	php artisan route:clear

	@echo '--------------- 清除配置信息缓存 ---------------'
	php artisan config:clear

	@echo '--------------- 清除缓存数据 ---------------'
	php artisan cache:clear

	@echo '--------------- 拉取最新代码 ---------------'
	git pull

	@echo '--------------- 更新第三方包 ---------------'
	composer install

	@echo '--------------- 运行数据库迁移 ---------------'
	php artisan migrate

	@echo '--------------- 设置缓存 ID ---------------'
	php artisan pro:set-commit-id

	@echo '--------------- 更新前端依赖包 ---------------'
	yarn

	@echo '--------------- 编译前端依赖 ---------------'
	npm run dev

# 更新生产环境代码
update-production:
	@echo '--------------- 清除类映射加载优化 ---------------'
	php artisan clear-compiled

	@echo '--------------- 清除路由缓存 ---------------'
	php artisan route:clear

	@echo '--------------- 清除配置信息缓存 ---------------'
	php artisan config:clear

	@echo '--------------- 清除缓存数据 ---------------'
	php artisan cache:clear

	@echo '--------------- 拉取最新代码 ---------------'
	git pull

	@echo '--------------- 更新第三方包 ---------------'
	composer install --no-dev

	@echo '--------------- 运行数据库迁移 ---------------'
	php artisan migrate --force

	@echo '--------------- 设置缓存 ID ---------------'
	php artisan pro:set-commit-id

	@echo '--------------- 更新前端依赖包 ---------------'
	yarn

	@echo '--------------- 编译前端依赖 ---------------'
	npm run prod

	@echo '--------------- 配置信息缓存 ---------------'
	php artisan config:cache

	@echo '--------------- 路由缓存 ---------------'
	php artisan route:cache

	@echo '--------------- 类映射加载优化 ---------------'
	php artisan optimize --force
