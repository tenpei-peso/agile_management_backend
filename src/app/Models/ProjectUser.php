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

protected $guarded = ['id'];

// protected $table = 'project_users';

public function timecards()
{
    return $this->hasMany(TimeCard::class,'project_user_id','id');
}

public function bills()
{
    return $this->hasMany(Bill::class,'project_user_id','id');
}

public function project() {
    return $this->belongsTo(Project::class);
}

public function createOrUpdateTimecard($organized_timecards_input)
    {
        try {
                $this->find($organized_timecards_input['project_user_id'])
                    ->timecards()
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
                ->timecards()
                ->whereYear('year_month_date',$year)
                ->whereMonth('year_month_date',$month)
                ->get();

            //billテーブルの情報を算出
            $all_operating_time = $query->sum('operating_time');
            $all_expense = $query->sum('expense');
            $month_all_cost = $organized_timecards_input['unit_price'] * $all_operating_time / 60 + $all_expense;

            //登録する
            $bill_input = [
                'project_user_id' => $organized_timecards_input['project_user_id'],
                'project_id' => $this->find($organized_timecards_input['project_user_id'])->project_id,
                'year_month' => $organized_timecards_input['year_month'],
                'month_all_cost' => $month_all_cost,
                'month_operating_time' => $all_operating_time,
                'month_other_cost' => $all_expense,
            ];

            $this->find($organized_timecards_input['project_user_id'])
                ->bills()
                ->updateOrCreate(['year_month' => $organized_timecards_input['year_month']],$bill_input);

                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    throw $e;
                }
            }

    //userProject一覧表示
    public function getUserProject($userId) {
        try {
            $data = $this->where('user_id', $userId)->with('project.owner', 'bills')->get();
            $arrangeData = [];
            //請求金額はbillのallCostを足せば良い
            //単価はproject_userのunit_priceで良い
            foreach ($data as $key => $value) {
                //billのmonth_all_costの合計
                $allCost = 0;
                $allOtherCost = 0;
                foreach ($value['bills'] as $key => $bill) {
                    $allCost += $bill['month_all_cost'];
                    $allOtherCost += $bill['month_other_cost'];
                };
                //billのmonth_operating_timeの合計
                $operatingTime = 0;
                foreach ($value['bills'] as $key => $bill) {
                    $operatingTime += $bill['month_operating_time'];
                };

                $pushData = [
                    'owner_name' => $value['project']['owner']['name'], //取引先
                    'name' => $value['project']['name'], //プロジェクト名
                    'unit_price' => $value['unit_price'], //単価
                    'month_operating_time' =>  $operatingTime, //稼働時間(合計)
                    'all_cost' => $allCost + $allOtherCost, //請求金額(合計)
                    'bill_send_date' => $value['bill_send_date'], //請求書送付日
                    'user_expired_date' => $value['user_expired_date'], //契約終了日
                    'contract_pdf_path' => $value['contract_pdf_path'],
                    'project_user_id' => $value['id'],
                ];
                $arrangeData[] = $pushData;
            }
            return $arrangeData;
        } catch(Exception $e) {
            Log::info('Modelで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
