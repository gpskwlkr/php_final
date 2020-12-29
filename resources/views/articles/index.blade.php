@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
            <button class="btn btn-primary"><a href="#" style="color: white; text-decoration: none;">Add new article</a></button>
        @endif
        <div class="row">
            <div class="col-sm-8 blog-main">
                @foreach($articles as $article)
                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ $article->title }}</h2>
                        <p class="blog-post-meta">{{ $article->created_at }}</p>

                        <small>{{ $article->small_description }}</small>
                    </div>

                    <a href="#">Read more</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
