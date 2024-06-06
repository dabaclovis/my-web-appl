@extends('layouts.user')

@section('content')
    <div class="jumbotron w3-center">
        <h1 class="display-3">Jumbo heading</h1>
        <p class="lead">Jumbo helper text</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('articles.create') }}" role="button">Create Article</a>
        </p>
    </div>
@endsection
