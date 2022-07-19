<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeCard;
use Illuminate\Support\Facades\Log;
use Exception;

class TimeCardController extends Controller
{
    public function getTimeCard(TimeCard $timeCard,$project_id)
    {

        try {
            //Auth::id();で後ほど取得したいがとりあえずは１
            $user_id = 1;
            return $timeCard->getTimeCard($user_id,$project_id);
                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    return $e;
                }
    }
}
