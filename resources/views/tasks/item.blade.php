<div class="blog-post">
    <h2 class="blog-post-title"><a href="/articles/{{ $article->id }}">{{ $article->name }}</a></h2>
    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

    @if($article->tags->isNotEmpty())
        <div>
            @foreach($article->tags as $tag)
                <a href="" class="badge badge-secondary">{{ $tag->name }}</a>
            @endforeach
        </div>
    @endif

    {{ $article->body }}
</div><!-- /.blog-post -->
