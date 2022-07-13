# lv.pre

Template for Laravel Projects

MADE For Europe/German use

## TODO Tutorials(not implemented)

### AUTO-LOGIN-LOGOUT

Logged automatisch ein und aus -> überprüft status und lädt aktuelle Seite neu

### LITE SQL

Zweite DB um Dateibasiert zu speichern speziell benötigt

LANG doc:
installierte Sprachen -> Einstellbare INAPP | Sprachen in DB->zur Auto Selektion

Image:

überall <fieldset> verwernden

<https://github.com/spatie/laravel-searchable>

- Zeugs in var 1 irgenwie Funtionsfähig archivieren
- alles mit normalen Methoden ausgebaut nach Image

<https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers>

<https://medium.com/risan/seeding-table-with-relationships-in-laravel-c1e18355013f>
many rel ships

- Wenn user_id befüllt darf kein person_id befüllt sein..

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

```php
        /* Current Login User Details */

        $user = auth()->user();

        var_dump($user);

      

        /* Current Login User ID */

        $userID = auth()->user()->id; 

        var_dump($userID);

          

        /* Current Login User Name */

        $userName = auth()->user()->name; 

        var_dump($userName);

          

        /* Current Login User Email */

        $userEmail = auth()->user()->email; 

        var_dump($userEmail);
```

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
