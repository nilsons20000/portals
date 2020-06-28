<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

 



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
         if(empty($comment->body)){
            return back()->with('error', 'Lauks nevar būt tukšs! ');
        }else{
            $comment->user()->associate($request->user());
            $post = Article::find($request->get('article_id'));
            $post->comment()->save($comment); 
            return back();
        }

    }

      public function replyStore(Request $request)
    {
        $reply = new Comment;
        $reply->body = $request->get('comment_body');
           if(empty($reply->body)){
            return back()->with('error', 'Lauks nevar būt tukšs! ');
        }else{
            $reply->user()->associate($request->user());
            $reply->parent_id = $request->get('comment_id');
            $post = Article::find($request->get('article_id'));

            $post->comment()->save($reply);

            return back();
        }
    }


    public function destroy($id){
       $comment=Comment::where('id',$id)->first();
       $comment->delete();
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
 
}
