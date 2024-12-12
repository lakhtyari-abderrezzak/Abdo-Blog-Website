<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    #[Url()]
    public $sort = 'desc'; 
    #[Url()]
    public $search = "";
    #[Url()]
    public $category = "";

    #[On('search')]
    public function updateSearch($search){
        $this->search = $search;
    }
    public function clearFilters(){
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }
    public function sortHelper($sort){
        $this->sort = ($sort === 'asc') ? 'desc' : 'asc';
    }
    
    #[Computed()]
    public function posts(){
        return Post::published()
        ->with(['categories', 'author'])
        ->orderBy('published_at', $this->sort)
        ->when($this->activeCategory, function($query){
            $query->withCategory($this->category);
        })
        ->where('title','like', "%{$this->search}%" )
        ->paginate(5);
    }
    #[Computed()]
    public function activeCategory(){
        if($this->category === null || $this->category === ''){
            return null;
        }
        return Category::where('slug', $this->category)->first() ?? false;
    }
    public function render()
    {
        return view('livewire.post-list' );
    }
}
