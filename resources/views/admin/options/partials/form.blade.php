<div class="rtq">
  <label for="">Pirma footer kolona</label>
  <textarea name="first_column" class="form-control" id="first_column">{{ $options ?   $options['first_column']  : '' }}</textarea>
</div>

<div class="rtq">
  <label for="">Otra footer kolona</label>
  <textarea name="second_column" class="form-control" id="second_column">{{ $options ?   $options['second_column']  : '' }}</textarea>
</div>

<div class="rtq">
  <label for="">Treša footer kolona</label>
  <textarea name="third_column" class="form-control" id="third_column">{{ $options ?  $options['third_column']  : '' }}</textarea>
</div>

<input class="btn save-btn" type="submit" value="SAGLABĀT">

<script type='text/javascript'>
$( document ).ready(function() {

  CKEDITOR.replace( 'first_column' );
  CKEDITOR.replace( 'second_column' );
  CKEDITOR.replace( 'third_column' );

});
</script>