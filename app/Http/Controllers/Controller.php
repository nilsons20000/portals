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

use Illuminate\Http\Exceptions\HttpResponseException;
use \Validator;

use Illuminate\Support\Facades\Input;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

      public function dashboard() {
		$user=auth()->user();
        if($user->role_id == 1){
	      return view('admin.dashboard', [
	        'categories' => Category::lastCategories(5),
	        'articles' => Article::whereBetween('published',[0,1,2,3])->lastArticles(5),
	        'users'   => User::lastUsers(5),
	        'users_today' => User::LastUsersToday(5),
	        'count_categories' => Category::count(),
	        'count_articles' => Article::whereBetween('published',[0,1,2,3])->count(),
	        'count_users' => User::count(),
	        'count_users_today' => User::whereDay('created_at','=',date('d'))->count(),
	      ]);
	      
	    } else if($user->role_id == 3){
	      	   return view('writer.dashboard', [
		        'categories' => Category::lastCategories(5),
		        'articles' => Article::whereBetween('published',[0,1,2,3])->lastArticles(5),
		        'count_categories' => Category::count(),
		        'count_articles' => Article::whereBetween('published',[0,1,2,3])->count(),
		      ]);

	      }
    }

    public function update_user(Request $request, User $user)
    {
    	$rules = [
            'name' => 'required|string|max:10',

    	];
    	$validator = Validator::make ( $request->all(), $rules );

    	if ($validator->fails ()) {
    		return response()->json( array (             
                'errors' => $validator->getMessageBag()->toArray(),
        	) );

        }else {
    	$data = User::find ( $request->id );

        $data->name = $request->name;
        $data->updated_at = $request->fc;
       
        $data->save();
        return response ()->json ( $data );

    	}
	} 


	public function deleteuser(Request $req) {
        User::find($req->id)->delete();
        return response()->json();
    }


}