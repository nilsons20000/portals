@extends('layouts.app')

@section('content')

<?php if((count($article_founds) > 0)){ ?>
	<div class="container news-row">
		<div class="title-container ">
			<div class="hedline-title-block"><h2 class="headline-title">Meklēšanas rezultāti</h2></div><div class="line news-search-line">|</div>
		</div>
		<div class="row news-small-row"  id="post-dataa">
			@include('blog.search_ajax')
		</div>
		<div class="ajax-load text-center" style="display:none">
			<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Ielāde</p>
		</div>
	</div>

<?php }else{ ?>
	<div class="register-container-line">
	    <div class="container container-user-auth register-line">
            <div class="search-container">
                <div class="search-block" >
                   <h3 class="search-title">Meklēšanas rezultāti</h3>
                   <h3 class="search-descript">Hmmmm…. Nekas netika atrasts!</h3>
                   <div class="form-group">
                        <div class="button">
                            <a href="{{ url('/') }}"><button type="submit" class="btn save-btn">
                                ATPAKAĻ UZ SĀKUMU
                            </button></a>
                        </div>
                    </div>
                </div>
            </div> 
	    </div>
	</div>

<?php } ?>

@include('layouts.actualNewsApi')

@endsection

@include('cookieConsent::index')




