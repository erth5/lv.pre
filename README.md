# lv.pre

Template for Laravel Projects

MADE For Europe/German use

## documantation

[integrated dependecies.md](doc/integrated.md)

[cache.md](doc/cache.md)

[description.md](doc/desc.md)

[environment.md](doc/environment.md)

[artisan commands.md](doc/artisans.md)

[Relationships.drawio](doc/Relationship_Modell.drawio)

---

## helper

### lang

search:
'item'
replace in view
{{ __('file.name') }}
replace in logic
__('file.name')

### forbidden - wrong html

placeholder='
class='

>>

<<

btn-yellow

## variants

- image v1: has-pics, seperated-yield, ressource
- image v2: named-pics, merged-component, any

## distriction

views/components No Routing

app\
Services only Procedurally

Http\
Controllers\Modules only Objective

- Object type
- Objective Instantiate
- Procedurally static

### Symlink is need to run storage:link on EACH environment

php artisan storage:link

## Languages setttings

First Language English (US)
Second Language German (DE)
EN

- Fallback

DE

- Localisation
- Faker
