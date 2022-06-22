# lv.pre

Template for Laravel Projects

MADE For Europe/German use

## TODO Tutorials(not implemented)

Debug Eintrag bezieht sich auf ENV File -> Datanbankeintrag löschen?!

<https://medium.com/risan/seeding-table-with-relationships-in-laravel-c1e18355013f>
many rel ships

<https://github.com/fruitcake/laravel-telescope-toolbar>

refactor:

add examplecontroller similar to personcontr?

user, person to view: rel
all without contr to view: menu
last table: HTTP Session

Sämtliche DB Abfragen, Logik aufgaben und Views Automatisieren:
$columns = $this->getFillable();
...

info:(Beispiel wie code geschrieben werden kann)
-user
-person
-image
-session
-template

ANALYse mit PHP Storm

test ist ausschließoich für Tests

Einseiter für Debug auf dem alles zu sehen ist

Route Subfolder Gruppieren

Umstellen auf Hilfsklasse von Michael, wenn verwendbar

Abschluss:
Abhöngigkeiten durchgehen
NamenskoventionsTest?

## Integrated

<https://github.com/apih/laravel-route-list-web>

<https://publisher.laravel-lang.com>

<https://github.com/getsolaris/laravel-make-service-command>

<https://www.tutsmake.com/laravel-9-create-multi-language-website-example-tutorial/>

<https://laravel-news.com/config-validator>

```terminal
php artisan session:table
```

```terminal
composer require laravel-lang/publisher laravel-lang/lang --dev
php artisan vendor:publish --provider="LaravelLang\Publisher\ServiceProvider"
```

### Testing

<https://laravel.com/docs/9.x/dusk>

## Outcludet

- Code generator (e. g. CrestApps)
- <https://github.com/staudenmeir/eloquent-has-many-deep>
- <https://laravelactions.com/>

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
php artisan migrate:status
php artisan db:wipe --force
```

```terminal
php artisan vendor:publish
```

## distriction

First Language English (US)
Second Language German (DE)

views/components No Routing

app\
Services only Procedurally

Http\
Controllers\Modules only Objective

Object type
Objective Instantiate
Procedurally static

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

## resource using

<https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers>
