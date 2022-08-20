<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function projectUsers () {
        return $this->belongsToMany(ProjectUser::class, 'project_users_roles');
    }
}
