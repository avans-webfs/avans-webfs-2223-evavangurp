<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\NewsArticle;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news/index', ['articles' => NewsArticle::all()->sortBy('updated_at')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:999'
        ]);

        $article = new NewsArticle([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $article->save();

        return redirect('/admin/news')->with('success', 'Artikel opgeslagen.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('news/edit', ['article' => NewsArticle::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:999'
        ]);
        $article = NewsArticle::findOrFail($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->updated_at = Carbon::now();
        $article->save();

        return redirect('/admin/news')->with('success', 'Artikel opgeslagen.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        NewsArticle::findOrFail($id)->delete();
        return redirect('/admin/news')->with('success', 'Artikel verwijderd.');
    }
}
