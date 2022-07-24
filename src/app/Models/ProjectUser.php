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

    public function createOrUpdateTimecard($organized_timecard_inputs)
    {
        try {
            foreach($organized_timecard_inputs as $organized_timecard_input)
            {
                $this->find($organized_timecard_input['project_user_id'])
                    ->timecard()
                    ->where('year_month_date',$organized_timecard_input['year_month_date'])
                    ->updateOrCreate(['order' => $organized_timecard_input['order']],$organized_timecard_input);
            }
                } catch (Exception $e) {
                    Log::emergency($e->getMessage());
                    throw $e;
                }
    }
}
