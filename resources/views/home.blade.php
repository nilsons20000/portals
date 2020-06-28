@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
       <div class="register-container-line">
          <div class="container container-user-auth user-panel register-line">
            <div class="panel panel-default">
              <div class="panel-heading">
                <p>Lietotāja panelis
                </p>
              </div>
              <div class="panel-body">
                @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
                @endif
                <div class="greeting-block">
                  <div class="greeting-image">
                    <img src="{{URL::to('/images')}}/Ilustracijas_ikona_sveiciens.png" alt="Ilustracijas_ikona_sveiciens">
                  </div>
                  <div class="greeting-text">
                    <h1 class="greeting-title">Sveiki!
                    </h1>
                    <h2 class="greeting-description-short">Prieks redzēt  
                      <span class="ajax-name"><span class="name-up-name">{{ Auth::user()->name }}</span>
                      </span> !
                    </h2>
                    <p class="greeting-description-long">Šeit jūs varat apskatīt, labot, ievietot sev vēlamo un redzēto, dalīties ar iegūto pieredzi un viedokli
                    </p>
                  </div>
                </div>
                <div class="user-info">
                  <div class="user-info-ajax-block">
                  <div class='ajax-modal'>

                    <div class="user-id">
                      <span class="us-title">Lietotāja id:
                      </span> 
                      <span class="us_id">
                        <?php echo  $users->id ?>
                      </span>
                    </div>

                    <div class="user-name">
                      <span class="us-title">Lietotāja vārds:
                      </span> 
                     <span class='ajax-name'> <span class="us_name">
                        <?php echo  $users->name; ?>
                      </span></span>
                    </div>

                    <div class="user-created_at">
                      <span class="us-title">Lietotāja reģistrēšanas datums:
                      </span>
                      <span class="us_created">
                        <?php echo  $users->created_at; ?>
                      </span>
                    </div>

                    <div class="user-updated_at">
                      <span class="us-title">Lietotāja rediģēšanas datums:
                      </span>
                      <span class="us_updated">
                        <?php echo  $users->updated_at; ?> 
                      </span>
                    </div>
                          
                  </div> 

                  <div class="title-container" style="margin-top: 10px"><div class="hedline-title-block"><h2 class="headline-title">Datu rediģēšana</h2></div>
                  <div class="line">|</div></div> 
                  <button class="edit-modal btn btn-info" data-id="{{$users->id}}" data-name="{{$users->name}}" data-created="{{$users->created_at}}"  data-updated="{{$users->updated_at}}"><span class='glyphicon glyphicon-edit'></span> REDIĢĒT DATUS</button></div></div>

                  <div class="create-button" style="margin-top: 30px">

                    @if($users->role_id==2)
                    <div class="title-container article-cabinet"><div class="hedline-title-block"><h2 class="headline-title">Raksti</h2></div><div class="line">|</div></div>
                    <button class='modal_user_article btn btn-info'><span class='glyphicon glyphicon-edit'></span>Raksti</button>
                  
                   <div class="title-container suggestion-article"><div class="hedline-title-block"><h2 class="headline-title">Piedāvāt rakstu</h2></div><div class="line">|</div></div>
                    <a class="btn btn-block" href="{{route('create')}}">Piedāvāt  rakstu</a>

                    @elseif ($users->role_id==1)
                     <div class="title-container"><div class="hedline-title-block"><h2 class="headline-title">Administratora panelis</h2></div><div class="line">|</div></div>
                    <a class="btn btn-block" href="{{URL::to('/admin')}}">Administrātora panelis</a>
                    @else
                       <div class="title-container"><div class="hedline-title-block"><h2 class="headline-title">Rakstnieku panelis</h2></div><div class="line">|</div></div>
                    <a class="btn btn-block" href="{{URL::to('/writer')}}">Rakstnieka panelis</a>
                    @endif

                  </div>
                </div>
              </div>
          </div>

      </div>
  </div>


</div>

@endsection
@include('cookieConsent::index')



<div id="myModal" class="modal fade modal-user-info-change" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="contact_us">

          <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Vārds:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" >
            </div>
          
          </div>
          <p class="fname_error error text-center alert alert-danger hidden"></p>
           <div class="form-group">
            <label class="control-label col-sm-2" for="create">Reģistrēšanas datums</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fc" disabled>
            </div>
          </div>

           <div class="form-group">
            <label class="control-label col-sm-2" for="update">Rediģēšanas  datums</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fu" disabled>
            </div>
          </div>

        </form>
        <div class="deleteContent">
            Jūs esāt pārliecināti, ka gribat izdzēst<span class="dname"></span> ? <span
            class="hidden did"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn delete actionBtn" data-dismiss="modal">
            <span id="footer_action_button" class='glyphicon'> </span>
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
            <span class='glyphicon glyphicon-remove'></span> Aizvērt
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="myModal_article" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
           <div class="section-ajax">
               @include('layouts.loader-ajax-admin.load_article_user_dashboard')
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-remove'></span> Close
              </button>
            </div>

        </div>
      </div>
    </div>
</div>






