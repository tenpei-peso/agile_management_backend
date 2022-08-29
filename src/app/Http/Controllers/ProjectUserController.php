<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TimeCardCreateRequest;
use App\Models\ProjectUser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectUserController extends Controller
{
    public function createOrUpdateTimecard(TimeCardCreateRequest $timecard_create_request,ProjectUser $project_user)
    {
        try {
            $timecards_inputs = $timecard_create_request->all();
            Log::info('渡ってきたタイムカード↓');
            Log::info($timecards_inputs);

            $collection_timecards_inputs = collect($timecards_inputs);
            //いらないデータ削除、unit_priceをintegerに変換
            $collection_timecards_inputs = $collection_timecards_inputs->map(function ($item,$key)
            {
                unset($item['id'],$item['data_number']);
                $item['unit_price'] = (int) $item['unit_price'];
                return $item;
            });
            $organized_timecards_inputs = $collection_timecards_inputs->toArray();
            Log::info('整形したタイムカード↓');
            Log::info($organized_timecards_inputs);

            //timecardテーブルに登録処理。
            foreach($organized_timecards_inputs as $organized_timecards_input){
            //タイムカード登録処理
            $project_user->createOrUpdateTimecard($organized_timecards_input);
        }

            //billテーブルに登録処理
            foreach($organized_timecards_inputs as $organized_timecards_input){
            //year_monthを作成
            $year = (string) date("Y",strtotime($organized_timecards_input['year_month_day']));
            $month = (string) date("m",strtotime($organized_timecards_input['year_month_day']));
            $year_month = $year.$month;
            //year_monthを配列に追加
            $organized_timecards_input = array_merge($organized_timecards_input,['year_month'=>$year_month]);
            //登録処理
            $project_user->calculateAndRegisterBillByMonth($year,$month,$organized_timecards_input);
        }
            return '完了しました';

                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    return $e;
                }

            }

    //ユーザープロジェクト一覧を表示
    public function getUserProject(ProjectUser $projectUser ,$userId) {
        try {
            $projectListData = $projectUser->getUserProject($userId);
            return $projectListData;
        } catch(Exception $e) {
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
}
