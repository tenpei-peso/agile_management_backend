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

    public function project () {
        return $this->belongsTo(Project::class);
    }

    public function users () {
        return $this->belongsToMany(User::class, 'role_users');
    }

    //メンバー構成取得
    public function getMemberStructure ($project_id) {
        try {
            $data = $this->where('project_id', $project_id)->with('users')->get();

            return $data;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function createOrUpdateRoleData ($project_id, $roleData, $user_id) {
        try {
                $role_ids = [];
                if($roleData) {
                    foreach ($roleData as $key => $role) {
                        $roleId = $this->updateOrCreate(
                            [
                                'project_id' => $project_id,
                                'name' => $role,
                            ]
                        );
                        $role_ids[] = $roleId->id;
                    }
                    $user = User::find($user_id);
                    $user->roles()->syncWithoutDetaching($role_ids);
                }
            return '成功しました';
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
