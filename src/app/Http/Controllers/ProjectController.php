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

            // return [$projectListData, $memberPath];
            return $projectListData;
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナーのプロジェクト作成
    public function createOwnerProject (Project $project, Earning $earning, CreateProject $request) {
        $earningData = $request->input('earning');
        $year_month = $request->input('earning_year_month');

        DB::beginTransaction();
        try {
            //プロジェクト作成
            $projectId = $project->createOwnerProject($request->all());
            Log::info('プロジェクト作成に成功しました。');

            //earningsに売り上げデータ入れる
            $earning->createEarningData($projectId, $earningData, $year_month);
            Log::info('売り上げ作成に成功しました。');

            DB::commit();
            return $projectId;
        } catch(\Exception $e) {
            DB::rollBack();
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
