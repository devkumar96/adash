<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function children()
    {
        return $this->hasMany(Permission::class);
    }

    public function scopeParent(Builder $query)
    {
        return $query->whereNull('permission_id');
    }
}
