
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */










	
// CKEDITOR
// $( document ).ready(function() {

   
//   CKEDITOR.replace( 'description_short' );
//   CKEDITOR.replace( 'description' );




// });


require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}


jQuery(window).scroll(function() {

    if (jQuery(window).scrollTop() > 150) {

        jQuery('.scrollup').fadeIn();

    } else {

        jQuery('.scrollup').fadeOut();

    }
});

jQuery(function() {

    jQuery('.scrollup').click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});

jQuery(document).ready(function() {

    // $('#menu-wrap').prepend("<div id='menu-icon'></div>");
    $("#menu-icon").on("click", function() {
        $(".menu-wrap-overlay").toggleClass("overlay-height");
        $(".menu").slideToggle();
    });

});

  jQuery(function () {
      jQuery(".col-lg-4").slice(0, 3).show();
      jQuery("#loadMore").on('click', function (e) {
          e.preventDefault();
          jQuery(".col-lg-4:hidden").slice(0, 3).slideDown();
          if (jQuery(".col-lg-4:hidden").length == 0) {
              jQuery("#load").fadeOut('slow');
          }
          jQuery('html,body').animate({
              scrollTop: $(this).offset().top
          }, 1500);
      });
  });

  jQuery(".js-form-item").on("click", function () {
    jQuery(this).addClass('form-item--input-filled');
  });
  jQuery(".form-item__input").on("blur", function () {
    if(jQuery(this).val() === '') {
        jQuery(this).parent('.js-form-item').removeClass('form-item--input-filled');
    }
  });


jQuery(document).on('click', '.edit-modal', function() {
        jQuery('#footer_action_button').text(" Atjaunošana");
        jQuery('#footer_action_button').addClass('glyphicon-check');
        jQuery('#footer_action_button').removeClass('glyphicon-trash');
        jQuery('.actionBtn').addClass('btn-success');
        jQuery('.actionBtn').removeClass('btn-danger');
        jQuery('.actionBtn').addClass('edit');
        jQuery('.modal-title').text('Atjaunošana');
        jQuery('.deleteContent').hide();
        jQuery('.form-horizontal').show();
        jQuery('#id').val($(this).data('id'));
        jQuery('#name').val($(this).data('name'));
        jQuery('#fc').val($(this).data('created'));
        jQuery('#fu').val($(this).data('updated'));
        jQuery('#myModal').modal('show');
    });

function fillmodalData(details){
    $('#fn').val(details[2]);
}

jQuery(document).on('click', '.modal_user_article', function() {
        jQuery('#footer_action_button').text(" Atjaunošana");
        jQuery('#footer_action_button').addClass('glyphicon-check');
        jQuery('#footer_action_button').removeClass('glyphicon-trash');
        jQuery('.actionBtn').addClass('btn-success');
        jQuery('.actionBtn').removeClass('btn-danger');
        jQuery('.actionBtn').addClass('edit');
        jQuery('.modal-title').text('Atjaunošana');
        jQuery('.deleteContent').hide();
        jQuery('.form-horizontal').show();
        jQuery('#fid').val($(this).data('id'));
        jQuery('#fn').val($(this).data('name'));
        jQuery('#fc').val($(this).data('created'));
        jQuery('#fu').val($(this).data('updated'));
        jQuery('#myModal_article').modal('show');
    });



jQuery('.modal-footer').on('click', '.edit', function() {
   var id = jQuery('#id').val();
  jQuery.ajax({
    type: 'post',
    url: '/update_user',
    data: {
        '_token': $('input[name=_token]').val(),
        'name': $('#name').val(),
        'id':$('#id').val(),
        'fc':$('#fc').val(),
        'fu':$('#fu').val(),

    },

    success: function(data) {
    if (data.errors){
          setTimeout(function () {
            jQuery('#myModal').addClass('show-with-error');
            $('#myModal').modal('show');
          error('Validation error!', 'Error Alert', {timeOut: 5000});
      }, 500);
    if(data.errors.name) {
        $('.fname_error').removeClass('hidden');
        $('.fname_error').text("Laukumu nevar atstāt tukšu! (max 10 simboli)");

    }             
      }else {
        jQuery('#myModal').removeClass('show-with-error');
        $('.error').addClass('hidden');
          var create = $('#fc').val(); 
          var date = new Date();  
          var update = ('0' + date.getDate()).slice(-2) + '/' + ('0' + (date.getMonth() + 1)).slice(-2) + '/' + date.getFullYear() + ' ' + ('0' + date.getHours()).slice(-2) + ':' + ('0' + date.getMinutes()).slice(-2);
          console.log (update);           
          alert("okay");
           $('.ajax-login-six').replaceWith("<span class='ajax-login-six'><span class='login'>" + data.name + "</span></span>");
           $('.ajax-login-first').replaceWith("<span class='ajax-login-first'><span class='login'>" + data.name + "</span></span>");
           $('.ajax-login-second').replaceWith("<span class='ajax-login-second'><span class='login'>" + data.name + "</span></span>");
           $('.ajax-login-third').replaceWith("<span class='ajax-login-third'><span class='login'>" + data.name + "</span></span>"); 
           $('.ajax-login-fourth').replaceWith("<span class='ajax-login-fourth'><span class='login'>" + data.name + "</span></span>");
           $('.ajax-login-five').replaceWith("<span class='ajax-login-five'><span class='login'>" + data.name + "</span></span>");
           $('.ajax-name').replaceWith("<span class='ajax-name'><span class='us_name'>" + data.name + "</span></span>");

           $('.user-info-ajax-block').replaceWith("<div class='user-info-ajax-block'><div class='ajax-modal'><div class='user-id'><span class='us-title'>Lietotāja id: </span> <span class='us_id'>" + data.id + "</span></div><div class='user-name'><span class='us-title'>Lietotāja vārds: </span> <span class='us_name'>" + data.name + "</span></div><div class='user-created_at'><span class='us-title'>Lietotāja reģistrēšanas datums: </span><span class='us_created'>" + create + "</span></div><div class='user-updated_at'><span class='us-title'>Lietotāja rediģēšanas datums: </span><span class='us_updated'>" + update + "</span></div></div><div class='title-container' style='margin-top: 10px'><div class='hedline-title-block'><h2 class='headline-title'>Datu rediģēšana</h2></div><div class='line'>|</div></div> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'        data-created='" + create + "' data-updated='" + update + "'><span class='glyphicon glyphicon-edit'></span> REDIĢĒT DATUS</button></div></div>");
         }           
    },
    error: function(data) {
    console.log(data);
      }
  });
});


jQuery('.modal-header').on('click', '.close', function() {
$('.error').addClass('hidden');

});
jQuery('.modal-footer').on('click', '.btn', function() {
$('.error').addClass('hidden');

});


jQuery(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Dzēšana");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Dzēšana');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
        $('#myModal').removeClass('show-with-error');
        $('.actionBtn').removeClass('edit');
    });

jQuery(document).on('click', '.actionBtn', function() {
  $('.actionBtn').removeClass('edit');
        $('.loader').addClass('lds-ring');
        setTimeout(function() {
            $('.loader').removeClass('lds-ring');
        },0);

    });


jQuery('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteuser',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.user' + $('.did').text()).remove();
            },
            error: function(data) {
              console.log(data);
            }

        });
    });




jQuery('.modal-footer').on('click', '.delete', function() {
   $('#myModal').modal('hide');
        $.ajax({
            type: 'post',
            url: '/deleteItemArticle',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.article' + $('.did').text()).remove();
            }
        });
    });

jQuery('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItemCategory',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.category' + $('.did').text()).remove();
            }
        });
    });






var page = 1;
  jQuery(window).scroll(function() {
      if(jQuery(window).scrollTop()  + $(window).height() + 100 >= $(document).height()) {
          page++;
          var query = jQuery('.search-input').val();
          loadMoreData(page, query);
      }
  });
function loadMoreData(page, query){
    $.ajax(
          {
              url: '?page=' + page + '&q=' + query,
              type: "get",

              beforeSend: function()
              {
                  jQuery('.ajax-load').show();
              },

              error: function(data) {
                console.log(data);
            }



          })
          .done(function(data)
          {
              if(data.html == " "){
                  $('.ajax-load').html("Not found");
                  return;
              }
               setTimeout(function(){
              jQuery('.ajax-load').hide();
              jQuery("#post-dataa").append(data.html);
            },1000);

              
      })

      .fail(function(jqXHR, ajaxOptions, thrownError)
      {
      });
 }

 jQuery(function() {
      jQuery('body').on('click', '.pagination a', function(e) {
          e.preventDefault();

          jQuery('#load a').css('color', '#dfecf6');
          jQuery('#load').append('<img style="position: absolute;top: 0;right: 0;bottom: 0;left: 0;margin: auto; z-index: 100000;" src="http://demo.itsolutionstuff.com/plugin/loader.gif" />');

          var url = $(this).attr('href');
          getArticles(url);
          window.history.pushState("", "", url);
      });

      function getArticles(url) {
          $.ajax({
              url : url
          }).done(function (data) {
              $('.section-ajax').html(data);
          }).fail(function () {
              alert('Articles could not be loaded.');
          });
      }
  });

