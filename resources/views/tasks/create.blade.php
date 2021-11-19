@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание Задачи
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

        <form method="post" action="/">

            {{  csrf_field() }}

            <div class="form-group">
                <label for="inputCharacterCode">Символьный код</label>
                <input type="text" class="form-control" id="inputCharacterCode" name="character_code" placeholder="Введите название задачи">
            </div>
            <div class="form-group">
                <label for="inputName">Название статьи</label>
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Введите название задачи">
            </div>
            <div class="form-group">
                <label for="inputBody">Краткое описание статьи</label>
                <input type="text" class="form-control" id="inputBody" name="body" placeholder="Введите название задачи">
            </div>
            <div class="form-group">
                <label for="inputDetailedDescription">Детальное описание</label>
                <input type="text" class="form-control" id="inputDetailedDescription" name="detailed_description" placeholder="Введите описание">
            </div>
            <div class="form-check">
                <input type="checkbox" name="checkTrue" class="form-check-input" id="checkTrue">
                <label class="form-check-label" for="checkTrue">Опубликовано </label>
            </div>
            <button type="submit" class="btn btn-primary">Создать задачу</button>
        </form>
    </div>
@endsection
