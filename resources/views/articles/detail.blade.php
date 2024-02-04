@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-header">
                <h3 class="card-title">{{ $article->title }}</h3>
            </div>
            <div class="card-body">
                <p class="card-content">{{ $article->body }}</p>
            </div>
            <div class="card-footer">
                <form action="{{ route('article.destroy', $article) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments ({{ count($article->comments) }})</b>
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item d-flex justify-content-between">
                    <span class="d-inline">{{ $comment->content }}</span>
                    <span class="d-inline">
                        <form action="{{ route('comment.destroy', $comment) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">&times;</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
        @auth
            <form action="{{ route('comment.store') }}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <textarea name="content" class="form-control @error('content')
                is-invalid
            @enderror"
                    placeholder="New Comment"></textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="submit" value="Add Comment" class="btn btn-primary">
            </form>
        @endauth

    </div>
@endsection
