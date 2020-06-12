@extends('layouts.app')

@section('main-content')
<!-- Title -->
<h1 class="mt-4">Create Article</h1>
@if($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{ $error }}
      </li>
      @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<form action="/articles/{{ $article->id }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text"
         class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
         id="title" 
         value="{{ old('title', $article->title) }}"
         name="title">
    @if ($errors->has('title'))
      <p class="text-danger foot-weight-light">{{ $errors->first('title') }}</p>
    @endif
  </div>
  <div class="form-group">
    <label for="excerpt">Excerpt</label>
    <input type="text"
         class="form-control @error('excerpt') is-invalid @enderror"
         id="excerpt"
         value="{{ old('excerpt', $article->excerpt) }}" 
         name="excerpt">
    @error('excerpt')
      <p class="text-danger foot-weight-light">{{ $errors->first('excerpt') }}</p>
    @enderror
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="5">{{ old('body', $article->body) }}</textarea>
    @error('body')
      <p class="text-danger foot-weight-light">{{ $message }}</p>
    @enderror
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-outline-primary">Submit</button>
  </div>
</form>

@endsection