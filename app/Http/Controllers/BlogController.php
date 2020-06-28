<?php

namespace App\Http\Controllers;
use App\Category;
use App\Article;
use App\System;
use App\Like;
use Illuminate\Http\Request;
use App\Events\PostHasViewed;
use Auth;

class BlogController extends Controller
{
    public function category($slug) {
    	$category = Category::where('slug', $slug)->first();
    	return view('blog.category', [
    		'category' => $category,
    		'articles' => $category->articles()->where('published', 1)->paginate(12)
    	]);
    }

    public function article($slug) {
        $post=Article::where('slug', $slug)->first();
        \Event::fire(new PostHasViewed($post));
    	return view('blog.article', [
    		'article' => $post,
    	]);
    }

    public function articlesAll(Request $request){
        return view('blog.home',[
            'articles' => Article::orderBy('created_at', 'desc')->where('published', 1)->paginate(10),
            'footers' => System::all(),
        ]);
    }






    public function liveSearch(Request $request){ 

      $search = $request->id;

      if (is_null($search))
      {
          return view('blog.home',[
          'articles' => Article::orderBy('created_at', 'desc')->where('published', 1)->paginate(10),
          'footers' => System::all(),
      ]);
      }
      else
      {
          $posts = Article::where('meta_keyword','LIKE','%'.$search.'%')->get();
          return view('livesearchajax')->withPosts($posts);
      }
    }



}