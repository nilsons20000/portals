@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif

<label for="">Vārds</label><span class="required">*</span>
<input type="text" class="form-control" name="name" placeholder="Vārds" value="@if(old('name')){{old('name')}}@else{{$user->name ?? ""}}@endif" required>

<div class="rtq">
<label for="">Epasts</label><span class="required">*</span>
<input type="email" class="form-control" name="email" placeholder="Email" value="@if(old('email')){{old('email')}}@else{{$user->email ?? ""}}@endif" required>
</div>

<div class="rtq">
<label for="">Parole</label>
<input type="password" class="form-control" name="password">
</div>

<div class="rtq">
<label for="">Atkarto paroli</label>
<input type="password" class="form-control" name="password_confirmation">
</div>

<div class="rtq">
<label for="">Loma</label>

<select name="role_id" class="form-control" >
	  @if (isset($user->id)))
		  @foreach($user->roles as $role)
	         
			  	@if(($role->name)=='admin')
						<option value="1">Administrātors</option>
						<option value="2">Reģistrētājs lietotājs </option>
						<option value="3">Rakstnieks</option> 
					@elseif (($role->name)=='registered')
						<option value="2">Reģistrētājs lietotājs </option>
						<option value="1">Administrātors</option>
						<option value="3">Rakstnieks</option> 
					@elseif (($role->name)=='writer')
						<option value="3">Rakstnieks</option>
						<option value="1">Administrātors</option>
						<option value="2">Reģistrētājs lietotājs </option>
					@endif
			@endforeach  
		@else
			<option value="1">Administrators</option>
			<option value="2">Reģistrētājs lietotājs</option>
			<option value="3">Rakstnieks</option> 
		@endif
</select>

<hr />

<input class="btn save-btn" type="submit" value="SAGLABĀT">
