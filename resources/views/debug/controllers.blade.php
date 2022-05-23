<?php

$path = public_path('../app/Http/Controllers');

$files = File::allFiles($path);

dd($files);

