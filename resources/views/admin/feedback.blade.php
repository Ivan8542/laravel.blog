@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Список задач
        </h3>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">email</th>
                <th scope="col">сообщение</th>
                <th scope="col">дата получения</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
            <tr>
                <th scope="row">{{ $contact->id }}</th>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->body }}</td>
                <td>{{ $contact->created_at->toFormattedDateString() }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div><!-- /.blog-main -->
@endsection