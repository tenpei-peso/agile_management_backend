<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
use Illuminate\Http\Request;
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
}
