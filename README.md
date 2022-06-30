# lv.pre

Template for Laravel Projects

MADE For Europe/German use

## TODO Tutorials(not implemented)

Debug Datanbankeintrag löschen -> lang hinzu

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

## Integrated

<https://github.com/laravel/telescope>

<https://github.com/fruitcake/laravel-telescope-toolbar>

<https://github.com/apih/laravel-route-list-web>

<https://publisher.laravel-lang.com>

<https://github.com/spatie/laravel-permission>

<https://github.com/getsolaris/laravel-make-service-command>

<https://www.tutsmake.com/laravel-9-create-multi-language-website-example-tutorial/>

<https://laravel-news.com/config-validator>

<https://laravelactions.com/>

<https://github.com/laravel/pint>

<https://laravelactions.com/>

```terminal
php artisan session:table
```

```terminal
composer require laravel-lang/publisher laravel-lang/lang --dev
php artisan vendor:publish --provider="LaravelLang\Publisher\ServiceProvider"
```

### helper

#### lang

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

### Testing

<https://laravel.com/docs/9.x/dusk>

## Outcludet / Not Integrated by default

- Code generator (contained by CrestApps)
- permissions (contained by voyager, spatie permissions, breeez, jetbstream)
- <https://github.com/staudenmeir/eloquent-has-many-deep>
- <https://laraveli18n.kodilab.com/docs/model-translations/> (other integrated)

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
php artisan migrate:rollback --step=1
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

## nice to know

### How composer works?

laravel/excel requires the gd extension, since you didn't have it, composer is smart enough to "go backwards" and find suitable versions, but once it found that, other things were conflicting, and it does this endlessly until it can't resolve the issue.

Then it granted you the option to "ignore" what Composer is trying to do, which is the right thing - but by ignoring, you're also just asking for stuff to not work.

The .lock file contains package specific version based on SEMVER, so your composer.json might have version ^8.0 which means you can get versions from 8.0 -> 8.9, but not 9.0.
Your lock file might say that you have version 8.6.2 installed, because that's the ACTUAL version you're installing, the json file just gives a "range".

So usually when lock file errors occur, it's just because your package is locked to a version that conflicts with others, but by letting Composer be smart to resolve it and generate the proper lock file, we just deleted it and had it "be 600 IQ lifehacking".

### Check Relationships

#### 1 In the query itself, you can filter models that do not have any related items

```code
Model::has('posts')->get()
```

#### 2 Once you have a model, if you already have loaded the collection (which below #4 checks), you can call the count() method of the collection

```code
$model->posts->count();
```

#### 3 If you want to check without loading the relation, you can run a query on the relation

```code
$model->posts()->exists()
```

#### 4 If you want to check if the collection was eager loaded or not

```code
if ($model->relationLoaded('posts')) {
    // Use the collection, like #2 does...
}
```

#### 5 If model already have loaded relationship, you can determine the variable is null or call isEmpty() to check related items

### more implemtiere noch

 return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
return $this->hasOne(Phone::class, 'foreign_key', 'local_key');
