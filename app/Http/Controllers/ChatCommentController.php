<?php

namespace App\Http\Controllers;

use App\chatComment;
use Illuminate\Http\Request;

class ChatCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chatComment  = chatComment::all();
        return $this->jsonapi($chatComment, 'comentario', ['comment', 'created_at'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //chatComment::create(['comment'=>$request->comment]);
        chatComment::create(['comment' => $request->comment]);
        return response()->json(['status'=>'Comentarios creado crrectamente.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\chatComment  $chatComment
     * @return \Illuminate\Http\Response
     */
    public function show(chatComment $chatComment)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\chatComment  $chatComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chatComment $chatComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\chatComment  $chatComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(chatComment $chatComment)
    {
        //
    }
}
