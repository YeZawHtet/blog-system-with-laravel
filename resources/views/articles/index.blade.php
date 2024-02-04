@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
        {{ $articles->links() }}
        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-header">
                    <h3 class="card-title">{{ $article->title }}</h3>
                    <span>{{ $article->created_at->diffForHumans() }}</span>
                </div>
                <div class="card-body">
                    <p class="card-content">{{ $article->body }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('article.show', $article) }}">View Details</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
