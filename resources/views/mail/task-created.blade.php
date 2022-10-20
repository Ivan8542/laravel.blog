@component('mail::message')
# Создана новая задача: {{ $article->name }}

{{ $article->body }}

@component('mail::button', ['url' => '/articles/' . $article->id])
Посмотреть задачу
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

