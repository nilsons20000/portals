<?php
use App\Article;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');

Route::any('/blog/article/{slug?}','BlogController@article')->name('article');




// Route::post('/like','BlogController@postLikePost')->name('like');


Route::post('/like','Controller_Article_parents@postLikePost')->name('like');


// Route::post('/like','BlogController@getlike');
// Route::post('/blog/like/{id}','BlogController@like');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=> ['auth']], function(){
  Route::resource('/category', 'CategoryController', ['as'=>'admin']);
  Route::resource('/article', 'ArticleController', ['as'=>'admin']);
  Route::resource('/options', 'SystemController', ['as' =>'admin']);

  Route::group(['prefix' => 'user_managment', 'namespace' => 'UserManagment'], function() {
    Route::resource('/user', 'UserController', ['as' =>'admin.user_managment']);
  });

  Route::group(['middleware' => 'admin'], function() {
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
  });
});

  Route::group(['prefix'=>'writer', 'namespace'=>'Writer', 'middleware'=> ['auth']], function(){
  Route::resource('/category', 'CategoryController', ['as'=>'writer']);
  Route::resource('/article', 'ArticleController', ['as'=>'writer']);
    Route::group(['middleware' => 'writer'], function() {
      Route::get('/', 'DashboardController@dashboard')->name('writer.index');
    });
});

Auth::routes(['verify' => true]);

Route::get('/successfull', 'Auth\RegisterController@redirectPath');

Route::get('/successfull', 'HomeController@success');

Route::get('/', 'BlogController@articlesAll', function () {
    return view('blog.home');
});




Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');





Route::get('/all_article','LoadController@Dataload', function () {
    return view('blog.all_article');
 })->name('blog.all_article');

Route::post('/all_article','LoadController@DataAjaxload' , function () {
    return view('blog.all_article');
 })->name('blog.all_article');




Route::post ( '/deleteItemArticle', 'Controller_Article_parents@deleteItemArticle' );





Route::post ( '/deleteuser', 'Controller@deleteuser' );


Route::post ( '/update_user', 'Controller@update_user' );


Route::post ( '/deleteItemCategory', 'Controller_Category_parents@deleteItemCategory' );




Route::post('/comment/store', 'CommentController@store')->name('comment.add');

Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::delete('/comments/destroy/{id}', 'CommentController@destroy')->name('comment.destroy');





Auth::routes();

Route::group([], function(){

Route::get('/home', 'Controller_Article_parents@index')->name('/home');

Route::get('/home', 'Controller_Article_parents@index')->name('articles_suggest_user');

});



Route::get('/home/create','Controller_Article_parents@create', function () {
    return view('/home/create');
 })->name('create');



Route::any('/home/create/store','Controller_Article_parents@store', function () {
  return view('/home');
 })->name('articleSugg.add');






Route::get('/home', 'HomeController@getUser', function () {
    return view('/home');})->name('users');



Route::post('/home', 'Controller_Article_parents@index', function () {
    return view('/home');
 })->name('articles_suggest_user');





// Route::post('/home/edit/{id}','Controller_Article_parents@edit', function () {
//     return view('/home/edit');
//  })->name('update');

Route::get('/home/edit/{id}','Controller_Article_parents@edit_user', function () {
   return view('/home/edit/', [
    'article' => Article::find($id)
]);
 })->name('edit_user');


Route::put('/home/update/{id}','Controller_Article_parents@update_user', function () {
  return view('/home/update/');
 })->name('update');













Route::get('demos/livesearch','BlogController@liveSearch');        
















Route::any('/search','LoadController@LoadDataScrool');




