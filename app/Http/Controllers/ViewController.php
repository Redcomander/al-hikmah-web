<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;

class ViewController extends Controller
{
    public function welcome()
{
    $articles = article::where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->take(3) // Adjust the number of articles you want to display
        ->get();

    return view('welcome', compact('articles'));
}

}
