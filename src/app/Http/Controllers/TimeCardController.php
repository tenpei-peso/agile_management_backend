<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeCard;
use Illuminate\Support\Facades\Log;
use Exception;

class TimeCardController extends Controller
{
    public function getTimeCard(TimeCard $timecard,Request $request,$project_user_id)
    {

        try {
            //渡ってきたyear_monthの年と月を分離
            $year_month = $request->input('year_month');
            $year = (int) substr($year_month,0,4);
            $month = (int) substr($year_month,5,6);
            $collection_timecards_searched_by_year_month = collect($timecard->getTimeCard($project_user_id,$year,$month));

            //expenseを文字列に変換
            $response_timecard = $collection_timecards_searched_by_year_month->map(function ($item,$key)
            {
                $item['expense'] = (string) $item['expense'];
                return $item;
            });
            return $response_timecard->toArray();

                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    return $e;
                }
    }
}
