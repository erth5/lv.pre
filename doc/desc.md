# Description

## How composer works?

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
