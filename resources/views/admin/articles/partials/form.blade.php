<div class="group">
  <div class="first-group_element">
    <label for="published">Statuss</label>
    <select id="published" class="form-control" name="published">

    @if (isset($article) && isset($article->id))
        <option value="0" {{ ($article->published == 0) ? 'selected' : '' }}>Nav Publicēta</option>
        <option value="1" {{ ($article->published == 1) ? 'selected' : '' }}>Publicēta</option>
        <option value="2" {{ ($article->published == 2) ? 'selected' : '' }}>Piedāvāta</option>
        <option value="3" {{ ($article->published == 3) ? 'selected' : '' }}>Atcelta</option>
    @else
        <option value="0" selected >Nav Publicēta</option>
        <option value="1" >Publicēta</option>
    @endif
    </select>
  </div>
   <div class="second-group_element">
    <label for="title">Virsraksts</label><span class="required">*</span>
    <input id="title" type="text" class="form-control" name="title" placeholder="Ziņu virsraksts" value="{{ $article ? $article->title : '' }}" required>
    </div>
</div>

<div class="rtq">
  <label for="slug">Slug ( Unikāla vertība )</label>
  <input id="slug" class="form-control" type="text" name="slug" placeholder="Automatiski ģēnērācija" value="{{ $article ? $article->slug : '' }}" readonly />
</div>

<div class="rtq">
  <label for="parent_id">Vecāku kategorija</label><span class="required">*</span>
  <select id="parent_id" class="form-control" name="categories[]" multiple="" required>
      @include('admin.categories.partials.categories', 
            ['categories' => $categories,
             'current' => $article,
             'delimiter' => $delimiter])    
  </select>
</div>

<div class="rtq">
  <label for="">Īss apraskts</label><span class="required">*</span>
  <textarea name="description_short" class="form-control" id="description_short">{{$article->description_short ?? ""}}</textarea>
</div>

<div class="rtq">
  <label for="">Pilns apraksts</label><span class="required">*</span>
  <textarea name="description" class="form-control" id="description">{{$article->description ?? ""}}</textarea>
  <hr />
</div>

<div class="group">
  <div class="first-group_element">
    <label for="">Meta virsraksts</label><span class="required">*</span>
    <input  type="text" class="form-control" name="meta_title" placeholder="Meta virsraksts" value="{{ $article ? $article->meta_title : '' }}" required>
  </div>

  <div class="second-group_element">
    <label for="">Meta apraksts</label><span class="required">*</span>
    <input  type="text" class="form-control" name="meta_description" placeholder="Meta apraksts" value="{{ $article ? $article->meta_description : '' }}" required>
  </div>

</div>

<div class="rtq">
  <label for="">Atslēg vārdi</label><span class="required">*</span>
  <input  type="text" class="form-control" name="meta_keyword" placeholder="Atslēg vārdi" value="{{ $article ? $article->meta_keyword : '' }}" required>
</div>

<div class="rtq">
  <div class="form-group">
    <div class="upload">
      <label>Augšpieladējiet failu  </label>
      <input type="file" name="image_path" />
      <span class="text-muted">jpg, png, gif</span>
    </div>
  </div>
</div>

<input class="btn save-btn" type="submit" value="SAGLABĀT">
