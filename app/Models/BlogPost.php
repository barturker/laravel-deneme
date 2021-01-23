<?php

namespace App\Models;

use App\Scopes\DeletedAdminScope;
use App\Scopes\LatestScope;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class BlogPost extends Model
{
    use HasFactory;
    // protected $table = 'blogposts';

    protected $fillable = ['user_id','title', 'content'];

    use SoftDeletes, Taggable;


  public function image(){
    return $this->morphOne(Image::class, 'imageable');
  }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



    public function scopeLatest(Builder $query){
        return $query->orderBy(static::CREATED_AT, 'DESC');
    }


    public function scopeMostCommented(Builder $query){
        return $query->withCount('comments')->orderBy('comments_count', 'DESC');
    }

    public function scopeLatestWithRelations(Builder $query){
        return $query->latest()
            ->withCount('comments')
            ->with('user')
            ->with('tags');
    }


    //deleting post with associated comments
    public static function boot(){

        static::addGlobalScope(new DeletedAdminScope);
        parent::boot();

//        static::addGlobalScope(new LatestScope);

}
}
