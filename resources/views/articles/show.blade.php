@extends('layouts.user')

@section('content')
    <div class="card w3-card border-0">
            @if ($article->image)
                <img class="card-img-top" src="{{ asset('storage/images/'.$article->image) }}" alt="image">
            @endif
        <div class="card-body">
            <h3 class="card-title">
                <strong>
                    {{ Str::ucfirst($article->title) }}
                </strong>
            </h3>
            <p class="card-text" id="clsize">{{ Str::ucfirst($article->body) }}</p>

            <small>
                written by
                {{ $article->user->name }}

                {{ $article->created_at->diffForHumans() }}
            </small>
        </div>
        <div class=" mx-3 mb-1 d-flex justify-content-between">
            <a href="{{ route('home') }}" class=" btn btn-info">
                <i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i>
            </a>
            @if (Auth::user()->id === $article->user_id)
            <a href="{{ route('articles.edit', $article->id) }}" class=" btn btn-info">
                <i class="fa fa-edit" aria-hidden="true"></i>
            </a>
            @endif
        </div>
    </div>
@endsection
