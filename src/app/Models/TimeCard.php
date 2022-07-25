<?php

declare(strict_types=1);

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

    public function getTimeCard($project_user_id,$year,$month)
    {
        try {
        return $this->where('project_user_id',$project_user_id)
            ->whereYear('year_month_date',$year)
            ->whereMonth('year_month_date',$month)
            ->get();
                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    throw $e;
                }
    }
}
