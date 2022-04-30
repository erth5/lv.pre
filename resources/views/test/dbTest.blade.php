<?php
if(DB::connection()->getPdo())
{
    echo "Successfully connected to the database => "
        .DB::connection()->getDatabaseName();
}
