<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogPost(){
        return $this->hasMany(BlogPost::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

  public function commentsOn()
  {
    return $this->morphMany(Comment::class, 'commentable')->latest();
  }

  public function image(){
    return $this->morphOne(Image::class, 'imageable');
  }



    public function scopeMostBlogPosts(Builder $query)
    {
        return $query->withCount('blogPost')->orderBy('blog_post_count', 'DESC');
    }
    public function scopeMostBlogPostsLastMonths(Builder $query)
    {
        return $query->withCount(['blogPost' => function (Builder $query) {
            $query->whereBetween(static::CREATED_AT, [ now()->subMonths(1), now()]);
        }])->has('blogPost', '>=', 2)
            ->orderBy('blog_post_count', 'DESC');
    }

    public function scopeLatest(Builder $query){
        return $query->orderBy(static::CREATED_AT, 'DESC');
    }

    public function scopeThatHasCommentedOnPost(Builder $query, BlogPost $post)
    {
      return $query->whereHas('comments', function ($query) use ($post){
        return $query->where('commentable_id', '=', $post->id)
          ->where('commentable_type', '=', BlogPost::class);
      });
    }

    public function scopeThatIsAnAdmin(Builder $query){
      return $query->where('is_admin', true);
    }

}
