@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание Задачи
        </h3>

        @include('layout.error')

        <form method="post" action="/articles">

            {{  csrf_field() }}
            @include('layout.form_article')
            <button type="submit" class="btn btn-primary">Создать задачу</button>
        </form>
    </div>
@endsection
