https://www.tutsmake.com/laravel-9-upload-image-example-tutorial/
/**Syntax 2
         * name desciptes the uploaders file-system name
         * path descripes the Path from "storage/app/" with symlink to public
         */
        $name = $request->file('image')->getClientOriginalName();
        $dbItem = new Image();
        $path = $request->file('image')->store('public');
        $dbItem->name = $name;
        $dbItem->path = $path;
        $dbItem->save();
        $image = Image::all();
        dd($request, $validation, $dbItem, $name, $path);

        
    




CRUD!
        https://www.itsolutionstuff.com/post/laravel-9-resource-route-and-controller-exampleexample.html


        // Route::get('image', [ImageController::class, 'image']);