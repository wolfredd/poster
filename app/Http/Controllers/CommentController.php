<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    function addComment(Request $req){

        $comment = new Comment();
        $comment->username = $req->input('username');
        $comment->commentData = $req->input('commentData');
        $comment->postId = $req->input('postId');
        $comment->save();

        return $comment;
    }

    function allComments(){
        return Comment::all();
    }
}
