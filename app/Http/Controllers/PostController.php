<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostController extends Controller
{
    public function postCreatePost(Request $request)
    {
    	//validation
    	$this->validate($request, [
    		'body' => 'required|max:1000']);

    	$post = new Post();
    	$post->body = $request['body'];
    	$message = 'There was an error';
    	if($request->user()->posts()->save($post)) 
    	{
    		$message = 'Post was succesfully created!';

    	}
    	return redirect()->route('dashboard')->with(['message'=>$message]);
    }
}
