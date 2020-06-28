<?php

namespace App\Http\Controllers\Writer;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controller_Article_parents;

class ArticleController extends Controller_Article_parents
{

	public function edit_writer(Article $article){
		 return view('writer.articles.edit',[
	      'article' => $article,
	      'categories' => Category::with('children')->where('parent_id',0)->get(),
	      'delimiter' => ''
	    ]); 
	   
    }

}
