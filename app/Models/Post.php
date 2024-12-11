<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'user_id','image', 'title','slug',
        'body','published_at','featured'
    ];
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes() {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }
    public function scopePublished($query){
        $query->where('published_at', '<=' ,Carbon::now());
    }
    public function scopeFeatured($query){
        $query->where('featured', true);
    }
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
    public function scopeWithCategory($query, string $category){
        $query->whereHas('categories', function ($query) use ($category){
            $query->where('slug', $category);
        });
    }

    public function getMinRead(){
        $mins = round(str_word_count($this->body) / 250) ;
       return $mins = ($mins < 1) ? 1 : $mins;
    }
    public function getThumbnailsImage(){

        $isUrl = str_contains( $this->image ,'http' );
        return $isUrl ? $this->image : Storage::disk('public')->url($this->image);
    }

}
