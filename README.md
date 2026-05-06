```bash
composer install
cp .env.example .env
php artisan migrate:fresh --seed
php artisan scout:sync-index-settings
php artisan scout:queue-import "App\Models\Article" --chunk=500

php artisan queue:work
php artisan schedule:listen
npm run build
php artisan serve
```