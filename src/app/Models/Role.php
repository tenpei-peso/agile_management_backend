<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\ProjectUser;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function projectUsers () {
        return $this->belongsToMany(ProjectUser::class, 'project_users_roles');
    }

    public function createOrUpdateRoleData ($project_user_id, $roleData, $category_id) {
        try {
                $role_ids = [];
                foreach ($roleData as $key => $role) {
                    $roleId = $this->updateOrCreate(
                        [
                            'category_id' => $category_id[$key],
                            'name' => $role,
                        ]
                    );
                    $role_ids[] = $roleId->id;
                }
                $project_user = ProjectUser::find($project_user_id);
                $project_user->roles()->syncWithoutDetaching($role_ids);
            return '成功しました';
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
