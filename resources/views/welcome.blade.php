@extends('layouts/app')

@section('title', 'Titleeeee')

@section('main-content')
        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>
        @foreach($articles as $article)
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">{{ $article->title }}</h2>
            <p class="card-text">{{ $article->excerpt }}</p>
            <a href="/articles/{{ $article->id }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on January 1, 2017 by
            <a href="#">Start Bootstrap</a>
          </div>
        </div>
        @endforeach
        <!-- Pagination -->
        {{ $articles->links() }}
        <!-- <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->
@endsection