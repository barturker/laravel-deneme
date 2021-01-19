<?php

namespace  App\Http\ViewComposers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ActivityComposer{
    public function compose(View $view){
        $mostCommented = Cache::tags(['blog-post'])->remember('blog-post-mostCommented', 60, function (){
            return BlogPost::mostCommented()->take(5)->get();
        });

        $mostActive = Cache::remember('blog-post-mostActive', 60, function (){
            return User::MostBlogPosts()->take(5)->get();
        });

        $mostActiveLastMonth = Cache::remember('blog-post-mostActiveLastMonth', 60, function (){
            return User::MostBlogPostsLastMonths()->take(5)->get();
        });

        $view->with('mostCommented', $mostCommented);
        $view->with('mostActive', $mostActive);
        $view->with('mostActiveLastMonth',$mostActiveLastMonth);
    }
}
