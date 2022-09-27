<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ProjectUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function project () {
        return $this->belongsTo(Project::class);
    }
    public function bills () {
        return $this->hasMany(Bill::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

    //userProject一覧表示
    public function getUserProject ($userId) {
        try {
             //現在の月とってくる
            $dayDate = Carbon::parse('now');
            $nowYearMonth = $dayDate->format('Y-m');

            $data = $this->where('user_id', $userId)->with('project.owner', 'bills')->get();
            $arrangeData = [];
            //請求金額はbillのallCostを足せば良い
            //単価はproject_userのunit_priceで良い
            foreach ($data as $key => $value) {
                //billの当月month_all_costの合計
                $allCost = 0;
                foreach ($value['bills'] as $key => $bill) {
                    if($nowYearMonth == $bill['year_month']) {
                        $allCost += $bill['month_all_cost'];
                    } else {
                        $allCost += 0;
                    }
                };
                //billの当月month_operating_timeの合計
                $operatingTime = 0;
                foreach ($value['bills'] as $key => $bill) {
                        if($nowYearMonth == $bill['year_month']) {
                            $operatingTime += $bill['month_operating_time'];
                        } else {
                            $operatingTime += 0;
                        }
                    };

                $pushData = [
                    'id' => $value['project']['id'],
                    'owner_name' => $value['project']['owner']['name'], //取引先
                    'name' => $value['project']['name'], //プロジェクト名
                    'unit_price' => $value['unit_price'], //単価
                    'month_operating_time' =>  $operatingTime,//稼働時間(合計)
                    'all_cost' => $allCost, //請求金額(合計)
                    'bill_send_date' => $value['bill_send_date'], //請求書送付日
                    'user_expired_date' => $value['user_expired_date'], //契約終了日
                    'contract_pdf_path' => $value['contract_pdf_path'],
                    'project_user_id' => $value['id'],
                    'join_project' => $value['join_project'] //baclogで設定中のプロジェクト
                ];
                $arrangeData[] = $pushData;
            }
            return $arrangeData;
        } catch(\Exception $e) {
            Log::info('Modelで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //メンバー管理画面メンバー表示
    public function getMemberData ($project_id) {
        try {
             //現在の月とってくる
            $dayDate = Carbon::parse('now');
            $nowYearMonth = $dayDate->format('Y-m');

            $memberData = $this->where('project_id', $project_id)->with(['user.roles', 'bills'])->get();
            $arrangeData = [];
            foreach ($memberData as $key => $member) {
                //合計稼働時間計算
                //billの当月month_all_costの合計
                $allCost = 0;
                foreach ($member['bills'] as $key => $bill) {
                    if($nowYearMonth == $bill['year_month']) {
                        $allCost += $bill['month_all_cost'];
                    } else {
                        $allCost += 0;
                    }
                };
                //billの当月month_operating_timeの合計
                $operatingTime = 0;
                foreach ($member['bills'] as $key => $bill) {
                        if($nowYearMonth == $bill['year_month']) {
                            $operatingTime += $bill['month_operating_time'];
                        } else {
                            $operatingTime += 0;
                        }
                    };

                $pushData = [
                    "project_user_id" => $member['id'],
                    "user_id" => $member['user']['id'],
                    "photo_path" => $member['user']['photo_path'],
                    "name" => $member['user']['name'],
                    "role" => $member['user']['roles'],
                    "unit_price" => $member['unit_price'],
                    "expected_operating_time" => $member['expected_operating_time'],
                    "month_operating_time" => $operatingTime,
                    "all_cost" => $allCost,
                    "user_expired_date" => $member['user_expired_date'],
                ];
                $arrangeData[] = $pushData;
            }
            return $arrangeData;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナーメンバー管理画面 詳細表示
    public function getDetailOwnerMemberManagement ($project_user_id) {
        try {
            $fetchData = $this->where('id', $project_user_id)->with('user.roles', 'project.roles')->get();

            $roleNames = [];
            foreach ($fetchData[0]['user']['roles'] as $key => $role) {
                $roleNames[] = $role['name'];
            }
            $autoCompleteRoles = [];
            foreach ($fetchData[0]['project']['roles'] as $key => $autoComplete) {
                $autoCompleteRoles[] = $autoComplete['name'];
            }

            $memberDetail = [
                "photo_path" => $fetchData[0]['user']['photo_path'],
                "email" => $fetchData[0]['user']['email'],
                "name" => $fetchData[0]['user']['name'],
                "roles" => $roleNames,
                "autoCompleteRoles" => $autoCompleteRoles,
                "user_id" => $fetchData[0]['user_id'],
                "project_id" => $fetchData[0]['project_id'],
                "unit_price" => $fetchData[0]['unit_price'],
                "expected_operating_time" => $fetchData[0]['expected_operating_time'],
                "contract_pdf_path" => $fetchData[0]['contract_pdf_path'],
                "user_contract_date" => $fetchData[0]['user_contract_date'],
                "user_expired_date" => $fetchData[0]['user_expired_date'],
            ];

            return $memberDetail;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナーメンバー管理画面 編集
    public function updateOwnerMemberManagement ($request, $id) {
        unset($request['project_user_id']);
        unset($request['roles']);
        unset($request['user_id']);

        try {
            $this->where('id', $id)->update($request);
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //backlog
    public function updateJoinProject ($id, $join_project) {
        try {
            $updateData = $this->where('id', $id)->update(['join_project' => $join_project]);
            return $updateData;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
