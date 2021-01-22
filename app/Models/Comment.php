<?php

namespace App\Models;

use App\Traits\taggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Comment extends Model
{
    use HasFactory;

    use SoftDeletes, Taggable;


    protected $fillable = ['user_id','content'];

    public function commentable(){
      return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }



    public function scopeLatest(Builder $query){
        return $query->orderBy(static::CREATED_AT, 'DESC');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function (Comment $comment) {

          if ($comment->commentable_type===BlogPost::class){
            Cache::tags(['blog-post'])->forget("blog-post-{$comment->commentable_id}");
            Cache::tags(['blog-post'])->forget('mostCommented');
          }
        });

        // static::addGlobalScope(new LatestScope);
    }


}
