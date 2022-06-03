<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Comment;

class CommentController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $comment)
    {
        $users = User::all();
        $comments = Comment::all();
        return view('comments.index',compact('comment', 'users', 'comments'))
                 ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'person' => 'required',
            'comment' => 'required',
        ]);
      
        Comment::create($request->all());
        return redirect()->route('products.index');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $comment)
    {
        return view('comments.edit',compact('comment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
       
       return redirect()->back();
    }
}
