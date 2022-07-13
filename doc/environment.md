# Environment

## Installation

``` terminal
composer require tcg/voyager
php artisan voyager:install
php artisan voyager:install --with-dummy
```

## Voyager

- Installation ohne Dummy Data schlägt fehl
- Erstellt storage-public LINK
- Manuelle Route
- Abhängigkeiten werden nicht automatisch hinzugefügt

``` php
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
use TCG\Voyager\Facades\Voyager;
```

## Verwendet, aber installiert eigenständig

### permission

composer require spatie/laravel-permission

'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];

### optional

APP_URL=<http://127.0.0.1:8000>
