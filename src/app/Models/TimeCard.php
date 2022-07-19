<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Exception;

class TimeCard extends Model
{
    use HasFactory;

    protected $table = 'timecards';

    protected $guarded = ['id'];

    public function getTimeCard($user_id,$project_id)
    {
        try {
            $timecards = $this->where('user_id',$user_id)
                        ->where('project_id',$project_id)
                        // ->except(['day','year_month','day'])
                        ->get();
            return $timecards;




                        // ->toArray();

            // $organizedTimecards = [];
            // foreach($timecards as $timecard){
            //     unset($timecard['year_month'],$timecard['day']);
            //     $organizedTimecards[] = $timecard;
            // }
            // return $organizedTimecards;

                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    throw $e;
                }
    }
}
