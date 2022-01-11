@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Контактная Форма
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
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Введите email">
            </div>
            <div class="form-group">
                <label for="inputBody">Сообщение</label>
                <input type="text" class="form-control" id="inputBody" name="body" placeholder="Введите сообщение">
            </div>
            <button type="submit" class="btn btn-primary">Отправить данные</button>
        </form>
    </div>
@endsection