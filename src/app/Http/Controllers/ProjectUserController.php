<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\Membermanagement;
use App\Models\Category;
use App\Models\ProjectUser;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectUserController extends Controller
{
    //ユーザープロジェクト一覧を表示
    public function getUserProject (ProjectUser $projectUser ,$userId) {
        try {
            $projectListData = $projectUser->getUserProject($userId);
            return $projectListData;
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
    //join_projectをupdate
    public function updateJoinProject (ProjectUser $projectUser, Request $request) {
        $id = $request->input('id');
        $join_project = $request->input('join_project');
        try {
            $updateData = $projectUser->updateJoinProject($id, $join_project);
            return $updateData;
        } catch(Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナーメンバー管理画面取得
    public function getOwnerMemberManagement (ProjectUser $projectUser, Category $category, $project_id) {
        try {
            //メンバー構成部分取得
            $memberStructure = $category->getMemberStructure($project_id);

            //メンバ表示画面
            $memberData = $projectUser->getMemberData($project_id);
            
            return [$memberStructure, $memberData];
        } catch(Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナーメンバー管理画面 編集
    public function updateOwnerMemberManagement (ProjectUser $projectUser, Role $role, Membermanagement $request) {
        $project_user_id = $request->input('project_user_id');
        $roleData = $request->input('role');
        $categoryId = $request->input('category_id');
        DB::beginTransaction();
        try {
            //編集
            $updatedData = $projectUser->updateOwnerMemberManagement($request->all(), $project_user_id);
            Log::info('編集が成功しました。');

            //roleテーブル作成、project_users_rolesテーブル作成
            $createOrUpdateRole = $role->createOrUpdateRoleData($project_user_id, $roleData, $categoryId);
            Log::info('role作成が成功しました。');

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => '編集に成功しました。'
            ]);
        } catch(Exception $e) {
            DB::rollBack();
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
