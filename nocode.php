<?php if (DB::connection()->getPdo()) {
    echo 'Successfully connected to the database => ' . DB::connection()->getDatabaseName();
}



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




                    /**
             * 
             * FEHLENDE BEREECHTIGUNGEN ?
             * 
             * 
             */
            // $array = [
            //     'name' => 'configName',
            //     'employee' => 'configEmployee'
            //   ];
            //   $fp = fopen(base_path('config/user.php'), 'w');
            //   fwrite($fp, '<?php return ' . var_export($array, true) . ';');
            //   fclose($fp);