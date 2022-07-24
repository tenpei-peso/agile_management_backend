<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TimeCardCreateRequest;
use Illuminate\Http\Request;
use App\Models\ProjectUser;
use Exception;
use Illuminate\Support\Facades\Log;

class ProjectUserController extends Controller
{

    public function createOrUpdateTimecard(TimeCardCreateRequest $timecard_create_request,ProjectUser $project_user)
    {
        try {
            $timecards_inputs = $timecard_create_request->all();

            $organized_timecard_inputs =[];

            //inputからidとdata_numberを削除、rest_timeを分に直す。
            foreach($timecards_inputs as $timecards_input){
            $rest_time_hour = (int)date("H",strtotime($timecards_input['rest_time']));
            $rest_time_minute = (int)date("i",strtotime($timecards_input['rest_time']));
            $rest_time_sum = $rest_time_hour*60+$rest_time_minute;
            unset($timecards_input['rest_time'],$timecards_input['id'],$timecards_input['data_number']);
            $timecards_input = array_merge($timecards_input,['rest_time'=>$rest_time_sum]);
            $organized_timecard_inputs[] =$timecards_input;
        }

            $project_user->createOrUpdateTimecard($organized_timecard_inputs);

            


                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    return $e;
                }
    }
}
