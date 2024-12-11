<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeButton extends Component
{

    public Post $post;
    public function toggleLike(){
        if(auth()->guest()){
            return redirect(route('login'), true);
        }

        $user = Auth::user();
        
        if($user->hasLiked($this->post)){
            $user->likes()->detach($this->post->id);
            // dd('working');
        }else{
            $user->likes()->attach($this->post);
        }

    }
    public function render()
    {
        return view('livewire.like-button');
    }
}
