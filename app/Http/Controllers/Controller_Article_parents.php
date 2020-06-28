<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Article;
use App\Category;
use App\User;
use App\System;
use App\Like;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Paginator;

class Controller_Article_parents extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){
     $user=auth()->user();
        if($user->role_id == 1 ||  $user->role_id == 3 ){

	        $articles =Article::where('published',[1])->orWhere('published',[0])->orderBy('created_at', 'desc')->paginate(3, ['*'], 'article_pagination');

			$articles_suggest =Article::where('published',[2])->orWhere('published',[3])->orderBy('created_at', 'desc')->paginate(3, ['*'], 'suggestion_user_table_user_dashboard');

	        if ($request->ajax()) {
	        	return view('layouts.loader-ajax-admin.load_article_dashboard', [
	        		'articles' => $articles,
					'articles_suggest' => $articles_suggest,
	        	])->render();  
	        }

	        if ($user->role_id == 1) {
	        	return view('admin.articles.index', compact(['articles','articles_suggest']));
        
	        }else  if($user->role_id == 3) {
	        	return view('writer.articles.index', compact(['articles','articles_suggest']));	
	        }
        	
        } else  if ($user->role_id == 2) {
		   $articles_suggest_user =Article::where('published',[2])->orWhere('published',[3])->orderBy('created_at', 'desc')->paginate(3, ['*'], 'suggestion_user_table_user_dashboard');
        	return view('layouts.loader-ajax-user.load_article_dashboard', [
	        	'articles_suggest_user' => $articles_suggest_user,
	        ]);
        }
   	}

   	public function imageUploadPost(Request $request){
        $path = $request->file('image')->store('uploads','public');
         return view ('You have successfully upload image.',['path'=> $path]);

    }

    public function create(){   
    	$user=auth()->user();
        if($user->role_id == 1){
	        return view('admin.articles.create',[
	            'article' => null,
	            'categories' => Category::with('children')->where('parent_id',0)->get(),
	            'delimiter' => ''
	        ]);
	    } else if($user->role_id == 3){
	    	return view('writer.articles.create',[
	            'article' => null,
	            'categories' => Category::with('children')->where('parent_id',0)->get(),
	            'delimiter' => ''
	        ]);
	    } else if ($user->role_id == 2) {
	    	return view('create',[
	            'article' => null,
	            'categories' => Category::with('children')->where('parent_id',0)->get(),
	            'delimiter' => ''
	        ]);
	    }
    }

    function store(Request $request){
    	$articles_suggest =Article::where('published',[2, 3])->orderBy('created_at', 'desc')->paginate(3, ['*'], 'suggestion_user_table_user_dashboard');
	    $new_name = $this->upload($request);
	    $article = Article::create([
	        'title' => $request->title,
	        'slug' => $request->slug,
	        'description_short' => $request->description_short,
	        'description' => $request->description,
	        'meta_title' => $request->meta_title,
	        'meta_description' => $request->meta_description,
	        'meta_keyword' => $request->meta_keyword,
	        'published' => $request->published,
	        'viewed' => 0,
	        'created_by' => auth()->id(),
	        'modified_by' => auth()->id(),
	        'image_path' => $new_name,
	        'author_id' => auth()->id(),
	    ]);
	    if ($request->input('categories')) :
	        $article->categories()->attach($request->input('categories'));
	    endif;

	    $user=auth()->user();

	    if($user->role_id == 1){
	    	return redirect()->route('admin.article.index')->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
		}else if($user->role_id == 3){
			return redirect()->route('writer.article.index')->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
		}else if ($user->role_id == 2){
			return redirect()->back()->with('message', 'Jūsu raksta tiek pievienots!');
	}
}


	function upload(Request $request){
    // $this->validate($request, [
    //     'select_file'  => 'required|image|mimes:jpg,png,gif|max:2048'
    // ]);
	    $image = $request->file('image_path');
	    if (!empty($image)){
	    $new_name = rand() . '.' . $image->getClientOriginalExtension();
		}
	    if (!empty($new_name)){
	    $image->move(public_path('images'), $new_name);
	    return $new_name;
		}
	}

	public function edit(Article $article){
		$user=auth()->user();

	    if($user->role_id == 1){
	        return view('admin.articles.edit',[
	          'article' => $article,
	          'categories' => Category::with('children')->where('parent_id',0)->get(),
	          'delimiter' => ''
	        ]); 
	    } else if($user->role_id == 3){
	    	 return view('writer.articles.edit',[
	          'article' => $article,
	          'categories' => Category::with('children')->where('parent_id',0)->get(),
	          'delimiter' => ''
	        ]); 
	    } else if ($user->role_id == 2) {
	    	return view('user.edit',[
	            'article' => $article,
	            'categories' => Category::with('children')->where('parent_id',0)->get(),
	            'delimiter' => ''
	        ]);
	    }
    }




    public function edit_user(Article $article,$id){
		$user=auth()->user();

	    if($user->role_id == 1){
	        return view('admin.articles.edit',[
	          'article' => $article,
	          'categories' => Category::with('children')->where('parent_id',0)->get(),
	          'delimiter' => ''
	        ]); 
	    } else if($user->role_id == 3){
	    	 return view('writer.articles.edit',[
	          'article' => $article,
	          'categories' => Category::with('children')->where('parent_id',0)->get(),
	          'delimiter' => ''
	        ]); 
	    } else if ($user->role_id == 2) {
	    	$article = Article::find($id);
	    	return view('user.edit',[
	            'article' => $article,
	            'categories' => Category::with('children')->where('parent_id',0)->get(),
	            'delimiter' => ''
	        ]);
	    }
    }






    public function update(Request $request, Article $article){
	    $article->update($request->except('slug', 'image_path'));
	    if ($request->hasFile('image_path')) {
	        $image = $request->file('image_path');
	        $new_name = rand() . '.' . $image->getClientOriginalExtension();
	        $image->move(public_path('images'), $new_name);

	        $article->image_path = $new_name;
	        $article->save();
	    }
	    $article->categories()->detach();
	    if ($request->has('categories')) {
	        $article->categories()->attach($request->input('categories'));
	    }
	    $user=auth()->user();
	    if($user->role_id == 1){
	    	return redirect()->route('admin.article.index');
		}else if($user->role_id == 3){
			return redirect()->route('writer.article.index');
		}
	}


        public function update_user(Request $request, Article $article,$id){
	    if ($request->hasFile('image_path')) {
	        $image = $request->file('image_path');
	        $new_name = rand() . '.' . $image->getClientOriginalExtension();
	        $image->move(public_path('images'), $new_name);

	        $article->image_path = $new_name;
	        
	        $article->save();
	    }
	    $article = Article::find($id);
	    $article->categories()->detach();
	    
	    if ($request->has('categories')) {
	       $article->categories()->attach($request->input('categories'));
	    }
		return redirect()->back()->with('message', 'Raksts atjaunots');
		
	}





	public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();

        $user=auth()->user();
	    if($user->role_id == 1){
       		return redirect()->route('admin.article.index');
        }else if($user->role_id == 3){
			return redirect()->route('writer.article.index');
		}   
    }

    public function deleteItemArticle(Article $article,Request $req) {
        $article->categories()->detach();
        Article::find($req->id)->delete();
        return response ()->json ();
    }


    




  public function postLikePost(Request $request)
       {
           $post_id = $request['postId'];   
           $is_like = $request['isLike'] === 'true';
           $update = false;
           $post = Article::find($post_id);
           if (!$post) {
               return null;
           }
           $user = Auth::user();
           $like = $user->likes()->where('post_id', $post_id)->first();
           if ($like) {
               $already_like = $like->like;
               $update = true;
               if ($already_like == $is_like) {
                   $like->delete();
                   return null;
               }
           } else {
               $like = new Like();
           }
           $like->like = $is_like;
           $like->user_id = $user->id;
           $like->post_id = $post->id;
           if ($update) {
               $like->update();
           } else {
               $like->save();
           }
           return null;
       }




















}
