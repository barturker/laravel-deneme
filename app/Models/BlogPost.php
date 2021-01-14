<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;
    // protected $table = 'blogposts';

    protected $fillable = ['title', 'content'];

    use SoftDeletes;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //deleting post with associated comments
    public static function boot(){
        parent::boot();

        static::deleting(function (BlogPost $blogPost){
            $blogPost->comments()->delete();
        });

        static::restoring(function (BlogPost $blogPost){
            $blogPost->comments()->restore();
        });


}
}
