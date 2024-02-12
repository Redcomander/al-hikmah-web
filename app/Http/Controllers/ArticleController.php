<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\article;
use App\Models\kategori;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = article::with('kategori')->paginate(10);
        return view('article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = User::select(['name', 'id'])->get();
        $Kategori = kategori::select(['Kategori', 'id'])->get();
        // $gambar_article = request('gambar_article')->store('article_picture');

        return view('article.create', compact('author', 'Kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request to ensure the file is present and is an image (you may add more specific validation rules)
        $request->validate([
            'gambar_article' => 'required|image', // Adjust validation rules as needed
        ]);

        // Store the uploaded file in the public storage directory
        $gambar_articlePath = $request->file('gambar_article')->store('article_picture', 'public');

        // Determine the status based on the presence of the "draft" parameter
        $status = $request->has('draft') ? 'Draft' : 'Published';

        // Create the article with the stored file path and status
        article::create([
            "title" => $request->title,
            "gambar_article" => $gambar_articlePath,
            "content" => $request->content,
            "kategori_id" => $request->kategori_id,
            "user_id" => $request->user_id,
            "status" => $status, // Set the status based on the presence of the "draft" parameter
        ]);

        return redirect('article');
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(article $article)
    {
        $author = User::select(['name', 'id'])->get();
        $Kategori = kategori::select(['Kategori', 'id'])->get();

        // $gambar_article = request('gambar_article')->store('article_picture');

        return view('article.edit', compact('author', 'article', 'Kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Check if a new file has been uploaded
        if ($request->hasFile('gambar_article')) {
            // Store the new uploaded file in the public storage directory
            $gambar_articlePath = $request->file('gambar_article')->store('article_picture', 'public');
        } else {
            // No new file uploaded, keep the existing value
            $gambar_articlePath = $request->input('current_gambar_article');
        }


        // Determine the status based on the presence of the "draft" parameter
        $status = $request->has('draft') ? 'Draft' : 'Published';

        // Use the correct method name "where" instead of "there"
        Article::where('id', $id)->update([
            "title" => $request->title,
            "gambar_article" => $gambar_articlePath,
            "content" => $request->content,
            "kategori_id" => $request->kategori_id,
            "user_id" => $request->user_id,
            "status" => $status, // Set the status based on the presence of the "draft" parameter
        ]);

        return redirect('article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        article::destroy($id);
        return redirect('/article');
    }

    public function showAll()
    {
        $articles = article::with('kategori')
            ->orderBy('kategori_id') // Order by kategori_id
            ->paginate(9); // Paginate with 9 items per page

        return view('showAll', compact('articles'));
    }

    public function showByCategory($category)
    {
        // Get the category ID based on the category name
        $categoryId = Kategori::where('Kategori', $category)->value('id');

        // Fetch articles for the selected category
        $articles = article::where('kategori_id', $categoryId)->paginate(10);

        return view('article.show_by_category', compact('articles', 'category'));
    }
}
