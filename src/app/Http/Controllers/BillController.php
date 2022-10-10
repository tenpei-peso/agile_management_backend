<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BillController extends Controller
{
    // プロジェクト一覧からの請求書一覧
    public function getOwnerBillsList (Bill $bill, Request $request) {
        $project_id = $request->input('project_id');
        $project_name = $request->input('project_name');
        try {
            //請求書一覧
            $ownerBillsList = $bill->getOwnerBillsList($project_id, $project_name);

            return $ownerBillsList;
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //メンバー管理画面から請求書一覧
    public function getBillListWithMemberManagement (Bill $bill, Request $request) {
        $project_user_id = $request->input('project_user_id');
        $project_name = $request->input('project_name');
        try {
            //請求書一覧
            $ownerBillsList = $bill->getBillListWithMemberManagement($project_user_id, $project_name);

            return $ownerBillsList;
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function getBillPdf (Bill $bill, Request $request) {
        try {
            $pdf = $bill->getBillPdf($request->all());

            return $pdf;
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
