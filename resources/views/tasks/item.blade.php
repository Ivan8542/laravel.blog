<div class="blog-post">
    <h2 class="blog-post-title"><a href="/articles/{{ $article->id }}">{{ $article->name }}</a></h2>
    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

    {{ $article->body }}
</div><!-- /.blog-post -->