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
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class Controller_Category_parents extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	  {
	    $this->user =auth()->user();
	  }
      
    public function dashboard() {
		$user=auth()->user();
        if($user->role_id == 1){
	      return view('admin.dashboard', [
	        'categories' => Category::lastCategories(5),
	        'articles' => Article::lastArticles(5),
	        'users'   => User::lastUsers(5),
	        'users_today' => User::LastUsersToday(5),
	        'count_categories' => Category::count(),
	        'count_articles' => Article::count(),
	        'count_users' => User::count(),
	        'count_users_today' => User::whereDay('created_at','=',date('d'))->count(),
	      ]);

	      } else if($user->role_id == 3){
	      	   return view('writer.dashboard', [
		        'categories' => Category::lastCategories(5),
		        'articles' => Article::lastArticles(5),
		        'count_categories' => Category::count(),
		        'count_articles' => Article::count()
		      ]);

	      }
    }

    public function index(Request $request){
    	$user=auth()->user();
        $categories = Category::paginate(3, ['*'], 'categories');
        if ($request->ajax()) {
            return view('layouts.loader-ajax-admin.load_category_admin_dashboard', ['categories' => $categories])->render();  
        }
        return view('admin.categories.index', compact('categories'));
   	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){   
    	$user=auth()->user();
        if($user->role_id == 1){
	          return view('writer.categories.create', [
	          'category'   => [],
	          'categories' => Category::with('children')->where('parent_id', '0')->get(),
	          'delimiter'  => ''
	        ]);
	    } else if($user->role_id == 3){
		      return view('admin.categories.create', [
	          'category'   => [],
	          'categories' => Category::with('children')->where('parent_id', '0')->get(),
	          'delimiter'  => ''
	        ]);
	    }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        Category::create($request->all());
        $user=auth()->user();
        if($user->role_id == 1){
        	return redirect()->route('admin.category.index');
    	} else if($user->role_id == 3){
    		return redirect()->route('writer.category.index');
    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category){
    	$user=auth()->user();
        if($user->role_id == 1){
	      	return view('admin.categories.edit', [
	        'category'   => $category,
	        'categories' => Category::with('children')->where('parent_id', '0')->get(),
	        'delimiter'  => ''
	      ]);
      	}else if($user->role_id == 3){
    			return view('writer.categories.edit', [
		        'category'   => $category,
		        'categories' => Category::with('children')->where('parent_id', '0')->get(),
		        'delimiter'  => ''
		      ]);
    	}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except('slug'));
        $user=auth()->user();
        if($user->role_id == 1){
        	return redirect()->route('admin.category.index');
    	}else if($user->role_id == 3){
    		return redirect()->route('writer.category.index');
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $user=auth()->user();
        if($user->role_id == 1){
            return redirect()->route('admin.category.index');
    	}else if($user->role_id == 3){
             return redirect()->route('writer.category.index');
    	}
    }

    public function deleteItemCategory(Request $req) {
        Category::find ( $req->id )->delete ();
        return response ()->json ();
    }

}
