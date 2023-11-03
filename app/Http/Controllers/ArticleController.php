<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('app.article.index', compact('articles'));
    }
    public function show($slug) {
        $article = Article::findBySlug($slug);
        return view('app.article.show', compact('article'));
    }

    public function allByTag(Tag $tag) {
        $articles = $tag->articles()->paginate(10);
        return view('app.article.byTag', compact('articles'));
    }
}
