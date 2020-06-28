<div id="load" style="position: relative;">
	
	<div class="table-responsive">
		<div class="table-section">
		  <table class="table table-striped">
		    <thead>
		      <th>Nosaukums</th>
		      <th>Publikacijas statuss</th>
		      <th>Ziņu skaits</th>
		      <th class="text-right">Darbības</th>
		    </thead>
		    <tbody>
		    @foreach($categories as $category)
		        <tr class="category{{$category->id}}">
		          <td>{{$category->title}}</td>
		          <td>{{$category->published}}</td>
		          <td>{{$category->articles()->count()}}</td>
		          <td class="text-right">
		              <input type="hidden" name="_method" value="DELETE">
		              {{ csrf_field() }}
		              <a class="btn btn-default" href="{{route('admin.category.edit', $category)}}"><i class="fa fa-edit"></i></a>
		             <button class="delete-modal btn" data-id="{{$category->id}}"
		                    data-name="{{$category->title}}">
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
		 @foreach($categories as $category)<?php $i++; ?>
		    <div class="card category{{$category->id}}">
		      <div class="card-header" id="heading_<?php echo $i ?>">
		        <h2 class="mb-0">
		          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $i ?>" aria-expanded="false" aria-controls="collapse_<?php echo $i ?>">
		            {{$category->title}}
		          </button>
		        </h2>
		      </div>

		      <div id="collapse_<?php echo $i ?>" class="collapse" aria-labelledby="heading_<?php echo $i ?>" class="collapse">
		        <div class="card-body">
		              <a class="btn btn-default" href="{{route('admin.category.edit', $category)}}"><i class="fa fa-edit"></i></a>
		              <button class="delete-modal btn" data-id="{{$category->id}}"
		                data-name="{{$category->title}}">
		                <i class="fa fa-trash"></i>
		              </button>
		          </div>
		      </div>
		    </div>
		 @endforeach
	</div>

	<div class="pagination-container">
		  <ul class="pagination">
		    {{ $categories->onEachSide(2)->links('vendor.pagination.custom') }}
		  </ul>
	</div>

</div>
