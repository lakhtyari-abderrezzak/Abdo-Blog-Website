<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class PostComments extends Component
{
    use WithPagination;
    public Post $post;

    #[Rule('required|min:3|max:250')]
    public string $comment;

    public function postComment(){
        if(Auth::guest()){
            return ;
        }
        $this->validateOnly('comment');
        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => Auth::id(),
        ]);
        $this->reset('comment');
    }
    #[Computed()]
    public function comments(){
        return $this->post->comments()->with('user')->latest()->paginate(5);
    }
    public function render()
    {
        return view('livewire.post-comments');
    }
}
