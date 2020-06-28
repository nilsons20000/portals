<div id="load" style="position: relative;">


	<h2 style="margin-top: 20px">Galvēnas ziņas</h2>	
	<div class="table-responsive">
		<div class="table-section">
		    <table class="table table-striped">
		      <thead>
		        <th>Nosaukums</th>
		        <th>Publikācija</th>
		        <th class="text-right">Darbība</th>
		      </thead>
		      <tbody>
		        @foreach ($articles as $article)
		          <tr class="article{{$article->id}}">
		            <td>{{$article->title}}</td>
		            <?php if ($article->published == 4) { ?>
		                    <td>Melnraksts</td>
		                  <?php  } else if($article->published == 2){ ?>
		                    <td>Piedāvāta</td>
		                  <?php  } else if($article->published == 1){ ?>
		                    <td>Publicēta</td>
		                  <?php  } else if ($article->published == 3){
		                     ?><td class="cancellation">Atcelta</td><?php 
		                   } else if($article->published == NULL) { ?>
		                   	<td class="cancellation">Nav publicēta</td>
		                   <?php } ?>
		            <td class="text-right">
		                <input type="hidden" name="_method" value="DELETE">
		                <?php 
		                $user=Auth::user();
		              
		                foreach($user->roles as $role){
		                if($role->name == 'writer'){ ?>
		                    <a class="btn btn-default" href="{{route('writer.article.edit', $article)}}"><i class="fa fa-edit"></i></a>
		                <?php } else if ($role->name == 'admin') { ?>
		                    <a class="btn btn-default" href="{{route('admin.article.edit', $article)}}"><i class="fa fa-edit"></i></a>
		                <?php } }?>

		                <button class="delete-modal btn" data-id="{{$article->id}}"
		                    data-name="{{$article->title}}">
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
	 @forelse ($articles as $article)<?php $i++; ?>
	    <div class="card  article{{$article->id}}">
	      <div class="card-header" id="heading_<?php echo $i ?>_suggestion">
	        <h2 class="mb-0">
	          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $i ?>_suggestion" aria-expanded="false" aria-controls="collapse_<?php echo $i ?>_suggestion">
	            {{$article->title}}
	          </button>
	        </h2>
	      </div>

	      <div id="collapse_<?php echo $i ?>_suggestion" class="collapse" aria-labelledby="heading_<?php echo $i ?>_suggestion" class="collapse">
	        <div class="card-body">

	           <?php if ($article->published == 4) { ?>
	                <p class="cancellation">Melnraksts</p>
	              <?php  } else if($article->published == 2){ ?>
	                <p class="cancellation">Piedāvāta</p>
	              <?php  } else if($article->published == 1){ ?>
	                <p class="cancellation">Publicēta</p>
	              <?php  } else if ($article->published == 3){
	                 ?><p class="cancellation">Atcelta</p><?php 
	               } else if($article->published == NULL) { ?>
	               	<p class="cancellation">Nav publicēta</p>
	               <?php } ?>

	               <input type="hidden" name="_method" value="DELETE">
	                <?php 
	                $user=Auth::user();
	              
	                foreach($user->roles as $role){
	                if($role->name == 'writer'){ ?>
	                    <a class="btn btn-default" href="{{route('writer.article.edit', $article)}}"><i class="fa fa-edit"></i></a>
	                <?php } else if ($role->name == 'admin') { ?>
	                    <a class="btn btn-default" href="{{route('admin.article.edit', $article)}}"><i class="fa fa-edit"></i></a>
	                <?php } }?>

	                <button class="delete-modal btn" data-id="{{$article->id}}"
	                    data-name="{{$article->title}}">
	                     <i class="fa fa-trash"></i>
	                </button>
	          </div>
	      </div>
	    </div>
	   @empty
	 @endforelse
	</div>

	<div class="pagination-container">
	    <ul class="pagination">
	    	{{ $articles->onEachSide(2)->links('vendor.pagination.custom') }}
	    </ul>
	</div>


	<h2>Ziņas no reģistrētiem lietotājiem</h2>	
	 <div class="table-responsive">
	 	<div class="table-section">
		    <table class="table table-striped">
			    <thead>
			      <th>Nosaukums</th>
			      <th>Publikācija</th>
			      <th class="text-right">Darbība</th>
			    </thead>
			    <tbody>
			      @foreach ($articles_suggest as $articlee)
			      <tr class="article{{$articlee->id}}">
			          <td>{{$articlee->title}}</td>
			            <?php if ($articlee->published == 4) { ?>
	                            <td>Melnraksts</td>
	                          <?php  } else if($articlee->published == 2){ ?>
	                            <td>Piedavāta</td>
	                          <?php  } else if($articlee->published == 1){ ?>
	                            <td>Publicēta</td>
	                          <?php  } else if ($articlee->published == 3){
	                             ?><td class="cancellation">Atcelta</td><?php 
	                           } else if($articlee->published == NULL) { ?>
	                           	<td class="cancellation">Nav publicēta</td>
	                           <?php } ?>
			            <td class="text-right">
			                <input type="hidden" name="_method" value="DELETE">
			                <?php 
			                $user=Auth::user();
			              
			                foreach($user->roles as $role){
			                if($role->name == 'writer'){ ?>
			                    <a class="btn btn-default" href="{{route('writer.article.edit', $articlee)}}"><i class="fa fa-edit"></i></a>
			                <?php } else if ($role->name == 'admin') { ?>
			                    <a class="btn btn-default" href="{{route('admin.article.edit', $articlee)}}"><i class="fa fa-edit"></i></a>
			                <?php } }?>

			                <button class="delete-modal btn" data-id="{{$articlee->id}}"
			                    data-name="{{$articlee->title}}">
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
	@foreach ($articles_suggest as $articlee)<?php $i++; ?>
	    <div class="card articlee{{$articlee->id}}">
	      <div class="card-header" id="heading_<?php echo $i ?>">
	        <h2 class="mb-0">
	          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $i ?>" aria-expanded="false" aria-controls="collapse_<?php echo $i ?>">
	            {{$articlee->title}}
	          </button>
	        </h2>
	      </div>
	      <div id="collapse_<?php echo $i ?>" class="collapse" aria-labelledby="heading_<?php echo $i ?>" class="collapse">
	        <div class="card-body">

	            <?php if ($articlee->published == 4) { ?>
		                <p class="cancellation">Melnraksts</p>
		              <?php  } else if($articlee->published == 2){ ?>
		                Piedavāta
		              <?php  } else if($articlee->published == 1){ ?>
		                <p class="cancellation">Publicēta</p>
		              <?php  } else if ($articlee->published == 3){
		                 ?><p class="cancellation">Atcelta</p><?php 
		               } else if($articlee->published == NULL) { ?>
		               	<p class="cancellation">Nav publicēta</p>
		               <?php } ?>
	               <input type="hidden" name="_method" value="DELETE">
	                <?php 
	                $user=Auth::user();
	                foreach($user->roles as $role){
	                if($role->name == 'writer'){ ?>
	                    <a class="btn btn-default" href="{{route('writer.article.edit', $articlee)}}"><i class="fa fa-edit"></i></a>
	                <?php } else if ($role->name == 'admin') { ?>
	                    <a class="btn btn-default" href="{{route('admin.article.edit', $articlee)}}"><i class="fa fa-edit"></i></a>
	                <?php } }?>

	                <button class="delete-modal btn" data-id="{{$articlee->id}}"
	                    data-name="{{$articlee->title}}">
	                     <i class="fa fa-trash"></i>
	                </button>

	          </div>
	      </div>
	    </div>
	@endforeach
	</div>
    <div class="pagination-container">
      <ul class="pagination">
        {{ $articles_suggest->onEachSide(2)->links('vendor.pagination.custom') }}
      </ul>
    </div>
</div>