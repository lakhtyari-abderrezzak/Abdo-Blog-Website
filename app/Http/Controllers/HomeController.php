<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        $featuredPost = Cache::remember('featuredPost', Carbon::now()->addDay(), function () {
           return Post::published()->with('categories')->featured()->latest('published_at')->take(3)->get();
        });
        $latestPost = Cache::remember('latestPost', Carbon::now()->addDay(), function(){
            return Post::published()->with('categories')->latest('published_at')->take(9)->get();
        });
        return view('home',
    [
        'featuredPost' => $featuredPost,
        'latestPost' => $latestPost
    ]);
    }
}
