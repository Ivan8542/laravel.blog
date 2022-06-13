<div class="form-group">
    <label for="inputCharacterCode">Символьный код</label>
    <input type="text" class="form-control" id="inputCharacterCode" name="character_code"
           placeholder="Введите название задачи" value="{{ old('character_code', $article->character_code ?? '') }}">
</div>
<div class="form-group">
    <label for="inputName">Название статьи</label>
    <input type="text" class="form-control" id="inputName" name="name" placeholder="Введите название задачи"
           value="{{ old('name', $article->name ?? '') }}">
</div>
<div class="form-group">
    <label for="inputBody">Краткое описание статьи</label>
    <input type="text" class="form-control" id="inputBody" name="body" placeholder="Введите название задачи"
           value="{{ old('body', $article->body ?? '') }}">
</div>
<div class="form-group">
    <label for="inputDetailedDescription">Детальное описание</label>
    <textarea  type="text" class="form-control" id="inputDetailedDescription" name="detailed_description"
               placeholder="Введите описание" >{{ old('detailed_description', $article->detailed_description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="inputDetailedDescription">Теги</label>
    <input type="text"
           class="form-control"
           id="inputTags"
           name="tags"
           placeholder="Введите теги"
           @if(Request::path() == 'articles/create/page')
            value="{{ old('tags', $article->tags->name ?? '') }}"
           @endif
           @if(Request::path() !== 'articles/create/page')
            value="{{ old('tags', $article->tags->pluck('name')->implode(',') ?? '') }}"
           @endif
           >
</div>

<div class="form-check">

    @if(Request::path() == 'articles/create/page')
        <input type="checkbox" name="published" class="form-check-input" id="published">
        <label class="form-check-label" for="published">Опубликовано </label>
    @endif

</div>
