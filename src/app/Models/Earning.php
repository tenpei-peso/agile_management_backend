<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Earning extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function createEarningData ($projectId, $earningData, $year_month) {
        try {
            $createData = $this->create([
                "project_id" => $projectId,
                "earning" => $earningData,
                "year_month" => $year_month
            ]);
            return $createData;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
