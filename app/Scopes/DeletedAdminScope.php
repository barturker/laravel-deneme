<?php


namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeletedAdminScope implements Scope
{

public function apply(Builder $builder, Model $model)
{
    // TODO: Implement apply() method.
    if (Auth::check() && Auth::user()->is_admin){
//        $builder->withTrashed();
        $builder->withoutGlobalScope(SoftDeletingScope::class);
    }
}

}
