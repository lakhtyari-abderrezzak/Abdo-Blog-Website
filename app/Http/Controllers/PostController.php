<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('posts.index',[
            'categories' => Category::take(10)
            ->whereHas('posts', function($query){
                    $query->published();
            })->get()
        ]);
    }
    public function show(Post $post){
        return view('posts.show',[
            'post' => $post
        ]);
    }
}
