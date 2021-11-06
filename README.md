## Application Outline

### Title
M.C.C VS: Must Counter Covid - Vaccination System

### Goal and Description
To diminish the percentage of covid cases in preparation for CHED's limited face-to-face classes.

### Target Audience
The system targets unvaccinated citizens.

### Scope and Limitations
This system aims to provide a medium for users who haven't gotten their covid vaccine shots yet. The system, so far, only allows (C)reate when it comes to resources. It also has 2 user access level for admin and user. Admins can create a center, and a vaccine. While users can freely select the centers and vaccines they want for their vaccination appointment. Due to time constraints, additional features such as vaccination card hasn't been implementend.

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
php artisan migrate:fresh -seed
```

Serve project:

```
php artisan serve
```

Run mix watch (development):

```
npm run watch
```

## Credentials
### Admin Account
    email: admin@admin.com
    password: Raite2021
### Default User Account
    email: user@user.com
    password: Raite2021
