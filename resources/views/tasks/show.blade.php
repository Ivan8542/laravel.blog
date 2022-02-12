@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->name }}

            <a href="/articles/{{ $article->id }}/edit">Изменить</a>
        </h3>

        <hr>
        @if($article->tags->isNotEmpty())
            <div>
                @foreach($article->tags as $tag)
                    <a href="" class="badge badge-secondary">{{ $tag->name }}</a>
                @endforeach
            </div>
        @endif

        {{ $article->body }}

        @if($article->steps->isNotEmpty())
        <ul class="list-group">
            @foreach($article->steps as $step)
                <li class="list-group-item">
                    <form method="POST" action="/completed-steps/{{ $step->id }}">
                        @if ($step->completed)
                            @method("DELETE")
                        @endif
                        @csrf
                        <div class="form-check">
                            <label class="form-check-label {{ $step->completed ? 'completed' : '' }}" >
                                <input
                                    class="form-check-label"
                                    type="checkbox"
                                    name="completed"
                                    onclick="this.form.submit()"
                                    {{ $step->completed ? 'checked' : '' }}
                                >
                                {{ $step->description }}
                            </label>
                        </div>
                    </form>
                </li>
            @endforeach
        </ul>
        @endif

        <form action="/articles/{{ $article->id }}/steps/" method="POST" class="card card-body mb-4">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Шаг" name="description" value="{{ old('description') }}">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

        @include('layout.error')

        <hr>
        <p class="blog-post-meta">Дата создания: {{ $article->created_at->toFormattedDateString() }}</p>

        {{ $article->detailed_description }}

        <hr>
        <a href="/">Вернуться к списку задач</a>

    </div>
@endsection
