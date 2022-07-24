<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Log;

class ProjectUser extends Model
{
    use HasFactory;

    protected $table = 'projects_users';

    protected $guarded = ['id'];

    public function timecard()
    {
        return $this->hasMany(TimeCard::class,'project_user_id','id');
    }

    public function bill()
    {
        return $this->hasMany(Bill::class,'project_user_id','id');
    }

    public function createOrUpdateTimecard($organized_timecards_input)
    {
        try {
                $this->find($organized_timecards_input['project_user_id'])
                    ->timecard()
                    ->where('year_month_date',$organized_timecards_input['year_month_date'])
                    ->updateOrCreate(['order' => $organized_timecards_input['order']],$organized_timecards_input);

                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    throw $e;
                }
    }

    public function calculateAndRegisterBillByMonth($year,$month,$organized_timecards_input)
    {
        try {
            //プロジェクトとユーザー、年月で絞ったクエリ
            $query = $this->find($organized_timecards_input['project_user_id'])
                ->timecard()
                ->whereYear('year_month_date',$year)
                ->whereMonth('year_month_date',$month)
                ->get();

            //billテーブルの情報を算出
            $all_operating_time = $query->sum('operating_time');
            $all_expense = $query->sum('expense');

            $unit_price = $this->find($organized_timecards_input['project_user_id'])
                ->bill()
                ->where('year_month',$organized_timecards_input['year_month'])
                ->value('unit_price');

            $month_all_cost = $unit_price * floor($all_operating_time/60) + $all_expense;

            //登録する
            $bill_input = [
                'month_operating_time' => $all_operating_time,
                'month_other_cost' => $all_expense,
                'month_all_cost' => $month_all_cost
            ];

            $this->find($organized_timecards_input['project_user_id'])
                ->bill()
                ->updateOrCreate(['year_month' => $organized_timecards_input['year_month']],$bill_input);

                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    throw $e;
                }
    }
}
