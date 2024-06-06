@extends('layouts.user')

@section('content')
    <div class="card">
        <div class="card-header w3-center w3-padding-16 w3-xlarge w3-text-teal">
            Create Article
        </div>
    </div>
    <div class="pt-2 w3-card-4 w3-container">
        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class=" form-group">
                <label for="title" class=" w3-round-large w3-card w3-large w3-container">Title</label>
                <input type="text" name="title" class=" form-control">
                @error('title')
                    <div class=" alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
             <div class=" form-group">
                <label for="title" class=" w3-round-large w3-card w3-large w3-container">Content</label>
                <textarea name="body" id="body" cols="30" rows="7" class="form-control"></textarea>
                @error('body')
                    <div class=" alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class=" form-group">
                <input type="file" name="image" id="image">
            </div>
            <div class=" form-group d-flex justify-content-end">
                <button type="submit" class="btn w3-teal">create</button>
            </div>
        </form>
    </div>
@endsection
