<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function testS3()
    {
        // Test uploading a file
        Storage::disk('s3')->put('laravel_test.txt', 'Laravel Test File Content');

        // Test retrieving the file
        $fileContents = Storage::disk('s3')->get('laravel_test.txt');

        // Dump and die to inspect the content
        dd($fileContents);
    }
}
