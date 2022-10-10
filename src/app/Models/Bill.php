<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Project;


class Bill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function project_user () {
        return $this->belongsTo(ProjectUser::class);
    }

    //オーナープロジェクトの請求書一覧
    public function getOwnerBillsList ($project_id, $project_name) {
        
        try {
            $billData = $this->where('project_id', $project_id)->with(['project_user.user'])->get();
            $getOwnerName = Project::where('id', $project_id)->with('owner')->get();
            $arrangeData = [];

            foreach ($billData as $key => $bill) {
                //請求書作成日
                $day_of_make_bill = $bill['year_month'].'-'.$bill['project_user']['bill_send_date'];
                // month_operating_timeの〇〇時間〇〇分に直す
                $hour = floor($bill['month_operating_time'] / 60);
                $minutes = $bill['month_operating_time'] - ($hour * 60);
                $changeMinutesForHour = round($minutes / 60, 3);
                $hourly_wage = ($hour + $changeMinutesForHour) * $bill['unit_price'];
                $tax = ceil($bill['month_all_cost'] * 0.1);

                $pushData = [
                    'bill_id' => $bill['id'],
                    'bill_year_month' => $bill['year_month'],
                    'project_name' => $project_name,
                    'unit_price' => $bill['unit_price'],
                    'month_operating_time' => $hour . '時間' .  $minutes . '分',
                    'month_other_cost' => $bill['month_other_cost'],
                    'month_all_cost' => $bill['month_all_cost'],
                    'user_name' => $bill['project_user']['user']['name'],
                    'user_email' => $bill['project_user']['user']['email'],
                    //振込先などもuserからとってきたい
                    'day_of_make_bill' => $day_of_make_bill,
                    'owner_name' => $getOwnerName[0]['owner']['name'],
                    'hourly_wage' => $hourly_wage,
                    'tax' => $tax,
                    'all_cost_with_tax' => $tax + $bill['month_all_cost'],
                ];
                $arrangeData[] = $pushData;
            };
            
            return $arrangeData;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function getBillListWithMemberManagement ($project_user_id, $project_name) {
        
        try {
            $billData = $this->where('project_user_id', $project_user_id)->with(['project_user.user'])->get();
            $getOwnerName = Project::where('project_user_id', $project_user_id)->with('owner')->get();
            $arrangeData = [];

            foreach ($billData as $key => $bill) {
                //請求書作成日
                $day_of_make_bill = $bill['year_month'].'-'.$bill['project_user']['bill_send_date'];
                // month_operating_timeの〇〇時間〇〇分に直す
                $hour = floor($bill['month_operating_time'] / 60);
                $minutes = $bill['month_operating_time'] - ($hour * 60);
                $changeMinutesForHour = round($minutes / 60, 3);
                $hourly_wage = ($hour + $changeMinutesForHour) * $bill['unit_price'];
                $tax = ceil($bill['month_all_cost'] * 0.1);

                $pushData = [
                    'bill_id' => $bill['id'],
                    'bill_year_month' => $bill['year_month'],
                    'project_name' => $project_name,
                    'unit_price' => $bill['unit_price'],
                    'month_operating_time' => $hour . '時間' .  $minutes . '分',
                    'month_other_cost' => $bill['month_other_cost'],
                    'month_all_cost' => $bill['month_all_cost'],
                    'user_name' => $bill['project_user']['user']['name'],
                    'user_email' => $bill['project_user']['user']['email'],
                    //振込先などもuserからとってきたい
                    'day_of_make_bill' => $day_of_make_bill,
                    'owner_name' => $getOwnerName[0]['owner']['name'],
                    'hourly_wage' => $hourly_wage,
                    'tax' => $tax,
                    'all_cost_with_tax' => $tax + $bill['month_all_cost'],
                ];
                $arrangeData[] = $pushData;
            };
            
            return $arrangeData;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
