# lv.pre

Template for Laravel Projects

MADE For Europe/German use

## Integrated

<https://github.com/apih/laravel-route-list-web>

## TODO

<https://github.com/CrestApps/laravel-code-generator>
can be better

### Tutorials(not implemented)

#### ...toMany relationships

<https://medium.com/risan/seeding-table-with-relationships-in-laravel-c1e18355013f>

### Outcludet

- Validation (LiveWire)

### Artisans

php artisan migrate:fresh --seed
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=PersonSeeder

php artisan db:wipe --force

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

## Attention - Symlink -- need to run storage:link on each environment

php artisan storage:link
from: <https://www.tutussfunny.com/laravel-9-image-upload-and-display/>

The [C:\Users\Eggo5\repo\lv.pre\public\storage] link has been connected to [C:\Users\Eggo5\repo\lv.pre\storage\app/public].
The links have been created.
