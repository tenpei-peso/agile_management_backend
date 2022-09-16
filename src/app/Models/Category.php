<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function roles () {
        return $this->hasMany(Role::class);
    }

    //メンバー構成取得
    public function getMemberStructure ($project_id) {
        try {
            $data = $this->with(['roles.projectUsers' => function($query) use ($project_id){
                $query->where('project_id', $project_id);
            }])->get();

            return $data;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
