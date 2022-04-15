@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->name }}

            <a href="/articles/{{ $article->id }}/edit">Изменить</a>
        </h3>

        @include('tasks.tags', ['tags' => $article->tags])

        <hr>

        {{ $article->body }}

        <hr>
        <p class="blog-post-meta">Дата создания: {{ $article->created_at->toFormattedDateString() }}</p>

        {{ $article->detailed_description }}

        @if($article->steps->isNotEmpty())
            <ul class="list-group">
                @foreach($article->steps as $step)
                    <li class="list-group-item">
                        <form method="POST" action="/completed-steps/{{ $step->id }}">
                            @if($step->completed)
                                @method('DELETE')
                            @endif

{{--                            @method('PATCH')--}}
                            @csrf

                            <div class="form-check">
                                <label class="form-check-label {{ $step->completed ? 'completed' : '' }}">
                                    <input type="checkbox"
                                           class="form-check-input"
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

        <form action="/articles/{{ $article->id }}/steps" class="card card-body mb-4" method="POST">
            @csrf
            <div class="form-group">
                <input
                    type="text" class="form-control"
                    placeholder="Шаг"
                    value="{{ old('description') }}"
                    name="description"
                >
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

        @include('layout.error')

        <hr>
        <a href="/">Вернуться к списку задач</a>

    </div>
@endsection
