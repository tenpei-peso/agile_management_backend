<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use Exception;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [

        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles () {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function userList() {
        try {
            $allUser = $this->all();
            return $allUser;
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }
    }

    public function getUserData($id) {
        try {
            $userData = $this->where('id', $id)->get();
            return $userData;
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }
    }

        //backlogAPI情報を設定
    public function settingBacklog($input, $allData) {
        try {
            unset($allData['id']);
            Log::info($allData);
            $settingData = $this->where('id', $input)->update($allData);
            return $settingData;
        } catch (Exception $e){
            Log::emergency($e->getMessage());
            return $e;
        }
    }
}
