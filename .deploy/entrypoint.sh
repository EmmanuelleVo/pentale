#!/bin/sh

echo "🎬 entrypoint.sh: [$(whoami)] [PHP $(php -r 'echo phpversion();')]"

composer dump-autoload --no-interaction --no-dev --optimize

RUN sudo chmod -R 777 storage

echo "🎬 artisan commands"
php artisan storage:link
# 💡 Group into a custom command e.g. php artisan app:on-deploy
php artisan migrate:fresh --no-interaction --force
php artisan cache:clear
php artisan config:clear
php artisan config:cache
php artisan db:seed
# php artisan queue:work

# echo "🎬 start supervisord"

# supervisord -c $LARAVEL_PATH/.deploy/config/supervisor.conf
