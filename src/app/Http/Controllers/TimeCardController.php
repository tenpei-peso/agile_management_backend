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
            //渡ってきたyear_month_dateの年と月を分離
            $year_month_date = $request->input('year_month_date');
            $year = date('Y', strtotime($year_month_date));
            $month = date('n', strtotime($year_month_date));

            $timecards_searched_by_year_month = $timecard->getTimeCard($project_user_id,$year,$month);

            return $timecards_searched_by_year_month;

                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    return $e;
                }
    }
}
