<?php

namespace App\Models;

use App\Traits\taggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use HasFactory;

    use SoftDeletes, Taggable;


    protected $fillable = ['user_id','content'];

  protected $hidden = [
    'commentable_type',
    'commentable_id',
    'deleted_at',
    'user_id'
  ];

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


}
