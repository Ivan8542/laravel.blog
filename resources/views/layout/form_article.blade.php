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
    <input type="text" class="form-control" id="inputDetailedDescription" name="detailed_description"
           placeholder="Введите описание" value="{{ old('detailed_description', $article->detailed_description ?? '') }}">
</div>
<div class="form-check">
    <input type="checkbox" name="published" class="form-check-input" id="published">
    <label class="form-check-label" for="published">Опубликовано </label>
</div>
