@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Изменение Задачи
        </h3>

        @if($errors->count())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/articles/{{ $article->id }}">

            {{  csrf_field() }}
            @method("PATCH")
            @include('layout.form_article')
            <button type="submit" class="btn btn-primary">Изменить задачу</button>
        </form>

        <form method="POST" action="/articles/{{ $article->id }}">

            @csrf
            @method("DELETE")

            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
