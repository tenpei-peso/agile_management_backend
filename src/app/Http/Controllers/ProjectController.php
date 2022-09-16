<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\CreateProject;
use App\Models\Earning;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            return [$memberPath, $projectListData];
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナーのプロジェクト作成
    public function createOwnerProject (Project $project, CreateProject $request) {
        try {
            //プロジェクト作成
            $projectId = $project->createOwnerProject($request->all());

            return $projectId;
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナーのプロジェクト編集
    public function updateOwnerProject (Project $project, CreateProject $request) {
        $projectId = $request->input('project_id');
        try {
            //プロジェクト編集
            $project->updateOwnerProject($request->all(), $projectId);

            return response()->json([
                'status' => 200,
                'message' => '編集に成功しました。'
            ]);
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
