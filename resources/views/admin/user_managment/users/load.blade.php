<div id="load" style="position: relative;">
	
	<div class="table-responsive">
		<div class="table-section">
		  <table class="table table-striped">
		    <thead>
		      <th>Vārds</th>
		      <th>Ēpasts</th>
		      <th>Statuss</th>
		      <th class="text-right">Darbības</th>
		    </thead>
		    <tbody>
			    @foreach($users as $user)
			        <tr class="user{{$user->id}}">
			           <td>{{$user->name}}</td>
      					<td>{{$user->email}}</td>
				           @foreach($user->roles as $role)
			              	<td>{{$role->name}}</td>
			               @endforeach
			          <td class="text-right">
			          		<input type="hidden" name="_method" value="DELETE">
			              <a class="btn btn-default" href="{{route('admin.user_managment.user.edit', $user)}}"><i class="fa fa-edit"></i></a>
			              <button class="delete-modal btn" data-id="{{$user->id}}"
		                    data-name="{{$user->name}}">
		                     <i class="fa fa-trash"></i>
		                 </button>
			            </td>
			        </tr>
			     @endforeach
		    </tbody>   
		  </table>
		</div>
	</div>

	<div class="accordion-responsive">
		 <?php $i=0; ?>
		 @foreach($users as $user)<?php $i++; ?>
		    <div class="card user{{$user->id}}">
		      <div class="card-header" id="heading_<?php echo $i ?>">
		        <h2 class="mb-0">
		          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $i ?>" aria-expanded="false" aria-controls="collapse_<?php echo $i ?>">
		           {{$user->name}}
		          </button>
		        </h2>
		      </div>

		      <div id="collapse_<?php echo $i ?>" class="collapse" aria-labelledby="heading_<?php echo $i ?>" class="collapse">
		        <div class="card-body">
		              <a class="btn btn-default" href="{{route('admin.user_managment.user.edit', $user)}}"><i class="fa fa-edit"></i></a>
		              <button class="delete-modal btn" data-id="{{$user->id}}"
               			 data-name="{{$user->name}}">
		                <i class="fa fa-trash"></i>
		              </button>
		          </div>
		      </div>
		    </div>
		 @endforeach
	</div>

	<div class="pagination-container">
	    <ul class="pagination">
	      {{ $users->onEachSide(2)->links('vendor.pagination.custom') }}
	    </ul>
	</div>

</div>



