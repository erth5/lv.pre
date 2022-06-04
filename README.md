# lv.pre

Template for Laravel Projects

MADE For Europe/German use

## TODO Tutorials(not implemented)

<https://medium.com/risan/seeding-table-with-relationships-in-laravel-c1e18355013f>
many rel ships

<https://github.com/fruitcake/laravel-telescope-toolbar>

assertThat

refactor:
user, person to view: rel
all without contr to view: menu
last table: HTTP Session
move controllers to extra folder?

## Integrated

<https://github.com/apih/laravel-route-list-web>

<https://publisher.laravel-lang.com>

<https://github.com/getsolaris/laravel-make-service-command>

<https://www.tutsmake.com/laravel-9-create-multi-language-website-example-tutorial/>

<https://laravel-news.com/config-validator>

```terminal
composer require laravel-lang/publisher laravel-lang/lang --dev
php artisan vendor:publish --provider="LaravelLang\Publisher\ServiceProvider"
```

### Testing

<https://laravel.com/docs/9.x/dusk>

## Outcludet

- Validations (e. g. LiveWire)
- Code generator (e. g. CrestApps)
- <https://github.com/staudenmeir/eloquent-has-many-deep>

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

app\
Services            only Procedurally

Http\
Controllers\Modules only Objective

Object type
Objective     Instantiate
Procedurally   static

## Symlink is need to run storage:link on EACH environment

php artisan storage:link

The [C:\Users\Eggo5\repo\lv.pre\public\storage] link has been connected to [C:\Users\Eggo5\repo\lv.pre\storage\app/public].
The links have been created.

## Languages setttings

EN

- Fallback

 DE

- Localisation
- Faker
