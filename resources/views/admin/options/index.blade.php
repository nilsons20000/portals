@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') <h1>Kājiena  informāiju maiņa @endslot</h1>
    @slot('parent') Galvēna @endslot
    @slot('active') Kājiena  informāiju maiņa @endslot
  @endcomponent

  <hr>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <th>Pirma Kolona</th>
        <th>Otra kolona</th>
        <th>Treša kolona</th>
      </thead>
      <tbody>
      <?php $array = json_decode(json_encode($options), true); ?>
          <tr>
            <td>Pirmas kolonas informācija</td>
            <td>Otras kolonas informācija</td>
            <td>Trešas kolonas informācija</td>
            <td class="text-right">
            <form method="post">
                <a class="btn btn-default" href="{{route('admin.options.edit', ['id' => $array['id']])}}"><i class="fa fa-edit"></i></a>
            </form>
            </td>
          </tr>
    
      </tbody>
    </table>
  </div>





  <div class="accordion-responsive">
  <?php $i=0; ?>
      <div class="card">
        <div class="card-header" id="heading">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_<?php echo $i ?>" aria-expanded="false" aria-controls="collapse">
             Kajenu kolonas info
            </button>
          </h2>
        </div>
        <div id="collapse_<?php echo $i ?>" class="collapse" aria-labelledby="heading_<?php echo $i ?>" class="collapse">
          <div class="card-body">
            <p class="cancellation">Kajenu kolonas info</p>
           <form method="post">
              <a class="btn btn-default" href="{{route('admin.options.edit', ['id' => $array['id']])}}"><i class="fa fa-edit"></i></a>
                </form>
          </div>
        </div>
      </div>
  </div>








</div>

@endsection
@include('cookieConsent::index')