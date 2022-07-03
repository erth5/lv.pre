# lv.pre

Template for Laravel Projects

MADE For Europe/German use

## TODO Tutorials(not implemented)

Image:

- Zeugs in var 1 irgenwie Funtionsfähig archiovieren
- alles mit normalen Methoden ausgebaut nach Image

<https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers>

<https://github.com/phpstan/phpstan>

Debug Datanbankeintrag löschen

<https://medium.com/risan/seeding-table-with-relationships-in-laravel-c1e18355013f>
many rel ships

refactor:

add examplecontroller similar to personcontr?

Entferne Debug und mache Funtionen wo sie nützlich sind hin
LangTests:

- installierte Sprachen entsprechen Database
- Wenn user_id befüllt darf kein person_id befüllt sein..

user, person to view: rel
all without contr to view: menu
last table: HTTP Session

info:(Beispiel wie code geschrieben werden kann)
-user
-person
-image
-session
-template

ANALYse mit PHP Storm

Umstellen auf Hilfsklasse von Michael, wenn verwendbar

Abschluss:
Abhängigkeiten durchgehen
NamenskoventionsTest?
README säubern

```terminal
php artisan session:table
```

```terminal
composer require laravel-lang/publisher laravel-lang/lang --dev
php artisan vendor:publish --provider="LaravelLang\Publisher\ServiceProvider"
```

- <https://laraveli18n.kodilab.com/docs/model-translations/> (other integrated)

- <https://github.com/staudenmeir/eloquent-has-many-deep>

## integrated

[file.md](doc/file.pdf)

## helper

### lang

search:
'item'
replace in view
{{ __('file.name') }}
replace in logic
__('file.name')

#### forbidden

placeholder='
class='
>>
<<
btn-yellow

## variants

- image v1: has-pics, seperated-yield, ressource
- image v2: named-pics, merged-component, any?

## artisans

```terminal
php artisan migrate:fresh --seed
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=PersonSeeder
```

```terminal
php artisan migrate:status
php artisan migrate:rollback --step=1
php artisan db:wipe --force
```

```terminal
php artisan vendor:publish
```

## distriction

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

First Language English (US)
Second Language German (DE)
EN

- Fallback

DE

- Localisation
- Faker
