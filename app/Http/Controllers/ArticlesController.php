<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index() {
    	$articles = Article::latest('updated_at')->paginate(3);
    	return view('welcome', [
    	'articles' => $articles,
    ]);
    }
    public function show($article_id) {
    	// dd($article_id);
    	$article = Article::findOrFail($article_id);
    	return view('article', [
    		'article' => $article,
    	]);
    }
}
