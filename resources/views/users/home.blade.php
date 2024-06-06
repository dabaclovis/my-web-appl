@extends('layouts.user')

@section('content')
    <div class="card">
        <div class="card-header w3-padding-16">
           <Strong class=" text-uppercase"> {{ Str::upper(Auth::user()->fname) }} Dashboard</Strong>
        </div>
    </div>
    <div class="card-body">
        @if (count($articles) > 0)

        <div class="">
            <p>You have created <span class=" badge badge-info">{{ $articles->count() }}</span> articles</p>
        </div>
        @foreach ($articles as $article)
            <div class="list-group">
                <a href="{{ route('articles.show',$article->id) }}" class="list-group-item list-group-item-action flex-column align-items-start w3-card mb-1">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="mb-1">{{ Str::ucfirst($article->title) }}</div>
                        <small>{{ Str::ucfirst($article->user->fname) }}</small>
                    </div>
                    <div class="mb-1">{{ Str::limit(Str::ucfirst($article->body),250, "...") }}</div>
                    <small>created about {{ $article->created_at->diffForHumans() }}</small>

                </a>
            </div>
        @endforeach
        @else
            <div class="w3-panel w3-center w3-teal w3-xlarge">
                <p>You  have not created any article</p>
            </div>
        @endif
    </div>

@endsection
