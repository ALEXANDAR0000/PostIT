<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request){
        $incominFields=$request=$request->validate([
          'title'=>'required',
          'body'=>'required'
        ]);
        $incominFields['title']=strip_tags($incominFields['title']);
        $incominFields['body']=strip_tags($incominFields['body']);
        $incominFields['user_id']=auth()->id();

        Post::create($incominFields);
        return redirect('/');

    }
}
