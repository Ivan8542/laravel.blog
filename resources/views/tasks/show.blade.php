@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->name }}

            <a href="/articles/{{ $article->id }}/edit">Изменить</a>
        </h3>

        <hr>

        {{ $article->body }}

        @include('layout.error')

        <hr>
        <p class="blog-post-meta">Дата создания: {{ $article->created_at->toFormattedDateString() }}</p>

        {{ $article->detailed_description }}

        <hr>
        <a href="/">Вернуться к списку задач</a>

    </div>
@endsection
