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
use Illuminate\Support\Facades\Paginator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getUser(Request $request){
        $user=auth()->user();
        $articles_suggest_user =Article::where('published','=',3)->ORwhere('published', '=', 2)->where('author_id', '=', $user->id)->orderBy('created_at', 'desc')->paginate(2, ['*'], 'suggestion_user_table_user_dashboard');

        if ($request->ajax()) {
            return view('layouts.loader-ajax-admin.load_article_user_dashboard', [
                'articles_suggest_user' => $articles_suggest_user,
            ])->render();  
            
        }

         return view('home  ',[
                'users' =>  $user,
                'articles_suggest_user' => $articles_suggest_user,
        ]);
    }

    public function success(){
        return view('successfull');
    }

    
}
