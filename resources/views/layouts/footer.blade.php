<div class="footer-container">
  <div class="register-container-line">
    <footer class="register-line">
      <!-- -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-3 footer-first-column">
            <?php echo $systems->first_column  ?>
             <a class="logo-link" href="{{ url('/') }}">
              <img src="{{URL::to('/images')}}/IKDIENA_LOGO_white.svg" alt="IKDIENA_LOGO">
            </a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-5 footer-second-column">
            <?php echo $systems->second_column  ?>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-3 footer-third-column">
            <?php echo $systems->third_column  ?>
          </div>
        </div>
        <div class="all-reight-reserved">
          <p class="copyright"> © SIA "Ikdiena" 
            <?php echo date("Y");?>. Visas tiesības aizsargātas.
          </p>
        </div>
      </div>
    </footer>
  </div>
</div>

<script type="text/javascript" src="/js/app.js"></script>
<script src="{{ asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
