<label for="">Status</label>
<select class="form-control" name="published">
  @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>Nav publicēts</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>Publicēts</option>
  @else
    <option value="0">Nav publicēts</option>
    <option value="1">Publicēts</option>
  @endif
</select>

<div class="rtq">
	<label for="">Nosaukums</label>
	<input type="text" class="form-control" name="title" placeholder="Kategorijas virsraksts" value="{{$category->title or ""}}" required>
</div>

<div class="rtq">
	<label for="">Slug</label>
	<input class="form-control" type="text" name="slug" placeholder="Automatiska ģenerācija" value="{{$category->slug or ""}}" readonly="">
</div>

<div class="rtq">
	<label for="">Vecāku kategorija</label>
	<select class="form-control" name="parent_id">
	  <option value="0">-- Bez vecāku kategorija --</option>
	  @include('admin.categories.partials.categories', ['categories' => $categories])
	</select>
</div>

<hr />

<input class="btn save-btn" type="submit" value="SAGLABĀT">
