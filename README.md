## Installation

Install dependencies:

```
composer install
npm install
```

Copy **env.example** and update **.env** with your settings (DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.):

```
copy .env.example .env
```

Generate laravel encryption key:

```
php artisan key:generate
```

Migrate database:

```
php artisan migrate
```

Serve project:

```
php artisan serve
```

Run mix watch (development):

```
npm run watch
```
