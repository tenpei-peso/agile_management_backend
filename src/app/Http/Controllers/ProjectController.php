<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    //オーナーのプロジェクト一覧画面表示
    public function getOwnerProject (Project $project, $owner_id) {
        try {
            //プロジェクト一覧をとってくる
            $projectListData = $project->getOwnerProject($owner_id);
            //メンバーの画像とってくる
            $memberPath = $project->getMemberPath($owner_id);

            return [$projectListData, $memberPath];
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
