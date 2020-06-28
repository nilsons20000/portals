<div id="load" style="position: relative;">

	<div class="table-responsive">
	 	<div class="table-section">
		    <table class="table table-striped">
		      <thead>
		        <th>Nosaukums</th>
		        <th>Publikācija</th>
		        <th class="text-right">Darbība</th>
		      </thead>
		           <tbody>
	                  @foreach ($articles_suggest_user as $article)
	                    <tr class="article{{$article->id}}" >
	                      <td>{{$article->title}}</td>
	                      <?php if ($article->published == 4) { ?>
	                        <td>Melnraksts</td>
	                      <?php  } else if($article->published == 2){ ?>
	                        <td>Piedāvāta</td>
	                      <?php  } else if($article->published == 1){ ?>
	                        <td>Publicēta</td>
	                      <?php  } else if ($article->published == 3){
	                         ?><td class="cancellation">Atcelta</td><?php 
	                       } ?>
	                       <td class="text-right">
	                       	<?php if ($article->published == 3 || $article->published == 2 || $article->published == 4) { ?>
			                    <a class="btn btn-default" href="{{route('edit_user', $article)}}"><i class="fa fa-edit"></i></a>
		                        <button class="delete-modal btn" data-id="{{$article->id}}"
		                          data-name="{{$article->title}}">
		                           <i class="fa fa-trash"></i>
		                        </button>
		                     <?php }?>
	                        </td>
	                    </tr>
	                  @endforeach
	               </tbody>
		    </table>
		</div>
	</div>

	<div class="accordion-responsive">
	<?php $i=0; ?>
	 @foreach ($articles_suggest_user as $article)<?php $i++; ?>
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
	                <p class="cancellation">Piedāvāt</p>
	             <?php  } else if ($article->published == 3){
	                 ?><p class="cancellation">Atcelta</p><?php 
	             } ?>

	            <input type="hidden" name="_method" value="DELETE">
	            <?php 
	            $user=Auth::user();
	          
	            foreach($user->roles as $role) ?>
		            <?php if ($article->published == 3 || $article->published == 2 || $article->published == 4) { ?>
	                <a class="btn btn-default" href="{{route('edit_user', $article)}}"><i class="fa fa-edit"></i></a>
	                <button class="delete-modal btn" data-id="{{$article->id}}"
	                  data-name="{{$article->title}}">
	                   <i class="fa fa-trash"></i>
	                </button>
             <?php }?>
	        </div>
	      </div>
	    </div>
	 @endforeach
	</div>

	<div class="pagination-container">
	  <ul class="pagination">
	    {{ $articles_suggest_user->onEachSide(2)->links('vendor.pagination.custom') }}
	  </ul>
	</div>

</div>
