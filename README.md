# lv.pre

Template for Laravel Projects

MADE For Europe/German use

## Integrated

<https://github.com/apih/laravel-route-list-web>

<https://publisher.laravel-lang.com>

```terminal
composer require laravel-lang/publisher laravel-lang/lang --dev
php artisan vendor:publish --provider="LaravelLang\Publisher\ServiceProvider"
```

## Outcludet

- Validations (for example Realize with: LiveWire)

## Variants

- image v1: has-pics, seperated-yield, ressource
- image v2: named-pics, merged-component, any?

## Artisans

```terminal
php artisan migrate:fresh --seed
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=PersonSeeder
```

```terminal
php artisan db:wipe --force
```

## distriction

First Language English (US)
Second Language German (DE)

views/components    No Routing

app\Http\
Services            only Procedurally
Controllers\Modules only Objective

Object type
Objective     Instantiate
Procedurally   static

## Symlink is need to run storage:link on EACH environment

php artisan storage:link

The [C:\Users\Eggo5\repo\lv.pre\public\storage] link has been connected to [C:\Users\Eggo5\repo\lv.pre\storage\app/public].
The links have been created.

## TODO Tutorials(not implemented)

<https://github.com/CrestApps/laravel-code-generator>
can be better

<https://medium.com/risan/seeding-table-with-relationships-in-laravel-c1e18355013f>
many rel ships

<https://laravel-news.com/config-validator>
todo

## set Languages

EN

- Fallback

 DE

- Localisation
- Faker
