<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class ArticlesController extends Controller
{
    public function index() {
        $tags = Tag::all();
        if(request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles()->paginate(3);
        }
        else {
    	$articles = Article::latest('updated_at')->paginate(3);
        }  
        // dd($articles[0]);
    	return view('articles.index', [
    	'articles' => $articles,
        'tags' => $tags
    ]);
    }
    public function show(Article $article) {
        /* Rote Model Binding
    Article::where('id', 1)->first();
    // After overriding in Article Model, 
    Article = Article::where('title', 'article')->first(); 
        */
    	// dd($article_id);
    	// $article = Article::findOrFail($article_id);
    	return view('articles.show', [
    		'article' => $article,
    	]);
    }
    public function create() {
        $tags = Tag::all();
    	return view('articles.create', compact(['tags']));
    }
    public function store() {
    	//GET or POST - request - Request - request()
    	//dd(request()-all())
    	//dd(request('title0'))
        // request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);
    	// $article = new Article();
    	// $article->title = request()->input('title');
    	// $article->excerpt = request()->input('excerpt');
    	// $article->body = request()->input('body');
    	// $article->save();
        $article = new Article($this->validateDate());
        $article->user_id = 1;
        $article->save();
        $article->tags()->attach(request('tags'));
        // Attach is used to insert in bridging table
        //Detach is used to remove from bridging table
        // Sync is used to detach those not present in the array passed and attach those who are.
    	return redirect('/articles');
    }
    public function edit(Article $article) {
    	// $article = Article::findOrFail($article_id);
    	return view('articles.edit', [
    		'article' => $article
    	]);
    }
    public function update(Article $article) {
    	// $article = Article::findOrFail($article_id);
    	// $article->title = request()->input('title');
    	// $article->excerpt = request()->input('excerpt');
    	// $article->body = request()->input('body');
    	// $article->save();

        $article->update($this->validateDate());
    	return redirect('/articles/'.$article->id);
    }
    public function validateDate() {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
