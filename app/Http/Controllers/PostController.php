<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    function addPost(Request $req){

        $post = new Post();
        $post->title = $req->input('title');
        $post->data = $req->input('data');
        $post->categoryId = $req->input('categoryId');
        $post->save();

        return $post;
    }

    function delete($id){

        $result =  Post::where('id', $id)->delete();
        if($result){
            return ["result" => "item has been deleted"];

        }else{
            return ["result" => "operation failed"];
        }
    }

    function updatePost($id, Request $req){
        
        $post = Post::find($id);
        $post->title = $req->input('title');
        $post->data = $req->input('data');
        $post->categoryId = $req->input('categoryId');
        $post->save();

        return $post;
    }

    function search($key){
        return Post::where('categoryId', 'Like', "%$key%")->get();
    }

    function allPosts(){
        return Post::all();
    }

    function getPost($id){
        return Post::find($id);
    }
}
