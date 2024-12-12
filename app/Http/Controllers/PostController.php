<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(){

        $categories = Cache::remember('posts-categories', Carbon::now()->addDay(), function(){
            return Category::take(10)
            ->whereHas('posts', function($query){
                    $query->published();
            })->get();
        });

        return view('posts.index',[
            'categories' => $categories,
        ]);
    }
    public function show(Post $post){
        return view('posts.show',[
            'post' => $post
        ]);
    }
}
