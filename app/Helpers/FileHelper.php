<?php

use Illuminate\Support\Facades\Storage;

if(!function_exists('getFiles')) {
    function getFiles($dir) 
    {
        return Storage::disk('public')->files($dir);
    }
}