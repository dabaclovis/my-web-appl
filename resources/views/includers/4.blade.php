<div class=" mb-2">
    {{ Auth::user()->name }}
    have Created
    <strong class=" badge badge-success">
        {{ $articles->count() }}
    </strong>
    Article(s)
</div>
@foreach ($articles as $article)
<div class="list-group">
    <a href="{{ route('articles.show', $article->id) }}" class="list-group-item list-group-item-action flex-column align-items-start mb-1 w3-panel">
        <div class="d-flex w-100 justify-content-between">
            <div class="mb-1">{{ Str::ucfirst($article->title) }}</div>
        </div>
        <p class="mb-1">{{ Str::limit(Str::ucfirst($article->body), 150, '...') }}</p>
        <small>
            written by
            {{ $article->user->name }}

            {{ $article->created_at->diffForHumans() }}
        </small>
    </a>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header w3-padding-16">{{ __('Dashboard') }}</div>

                <div class="card-body w3-card-4">
                    {{--total number of created articles  --}}
                    @if (count($articles) > 0)
                        @include('includers.4')
                    @else
                         <div class=" w3-center w3-text-red w3-xlarge">
                            <p>You don't have any article</p>
                         </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
