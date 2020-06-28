<?php

namespace App\Http\Controllers;
use App\Category;
use App\Article;
use App\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class LoadController extends Controller
{


public function LoadDataScrool(Request $request){
         $q = Input::get ( 'q' );
         $article_founds = Article::where('meta_keyword','LIKE','%'.$q.'%')->where('published',[1])->paginate(4);
         $html='';
            if ($request->ajax()) {
            $view = view('blog.search_ajax',compact('article_founds'))->render();
                return response()->json(['html'=>$view]);
            }
            return view('blog.search',compact('article_founds', 'q'));     
     }

   public function Dataload(){
        return view('blog.all_article',[
                    'post_data' =>Article::orderBy('created_at', 'desc')->where('published', 1)->limit(2)->get(),
                    'articles' => Article::orderBy('created_at', 'desc')->where('published', 1)->paginate(10),
        ]);
    }
	// function DataAjaxload
    public function DataAjaxload(Request $request)
    {
        $set_output = '';
        $id = $request->id;
        
        $post_data = Article::where('id','<',$id)->orderBy('created_at','DESC')->limit(3)->get();
        
        if(!$post_data->isEmpty())
        {
            foreach($post_data as $post_val)
            {
                $url_article =route('article', $post_val->slug);
                $url =url('/images/' .$post_val->image_path);
                $url_image_not_found =url('/images/image-not-found.png');

                $set_output .= '<div class="col-sm-6 col-md-6 col-lg-3 ajax-news-row">
                                    <a href='.$url_article.'>
                                        <div class="news-container-small-row">';
                                          if(!$post_val->image_path){
                                                $set_output .= '<img class="news-image" src='.$url_image_not_found.' alt="image-not-found-ikdiena">';
                                            }else {
                                                $set_output .= ' <img class="news-image" src='.$url.' alt="">';
                                            }
                                                $set_output .= ' <div class="big-news_container_descript">
                                                    <div class="news-detal">
                                                    <h6 class="news-title"><'.substr($post_val->title, 0,27)."…".' ?><span class="tooltiptext">'.$post_val->title.'</span></h6>
                                                        <h6 class="news-title">'.substr($post_val->title, 0,27)."…".'</h6>
                                                        <div class="detal-info">';
                                                           if($post_val->categories){
                                                                foreach($post_val->categories as $category){
                                                                    $set_output .= '<div class="display-category">';
                                                                    $set_output .= '<strong>'.$category->title.'</strong>';
                                                                    $set_output .= ' </div>';
                                                                }
                                                            }
                                                            if($post_val->created_at){
                                                               $set_output .= ' <div class="display-date">
                                                                '.$post_val->created_at->format('d'.'.'.'m'.'.'.'Y');
                                                                $set_output .= ' </div>';
                                                            }
                                                        $set_output .= ' </div>';
                                                    $set_output .= ' </div>';
                                                $set_output .= ' </div>';
                                        $set_output .= ' </div>';
                                   $set_output .= '  </a>';
                                $set_output .= ' </div>';
            }
            $set_output .= 
            '<div id="remove-row">
                <div class="row-button">
                    <button id="btn-more" data-id="{{ $post_val->id }}" class="btn-more btn-block" > Ieladēt vel </button>
                </div>
            </div>  ';
            echo $set_output;
        }
    }
}