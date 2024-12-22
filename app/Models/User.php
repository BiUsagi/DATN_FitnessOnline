<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    // Tên bảng
    protected $table = 'users';
    protected $guard_name = 'web';

    // Các trường có thể điền được
    protected $fillable = [
        'user_name',
        'email',
        'avatar',
        'address',
        'birthday',
        'gender',
        'password',
        'phone_number',
        'token',
        'boolean',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Phương thức tính tuổi từ ngày sinh
    public function getAgeFromBirthday()
    {
        $birthDate = Carbon::parse($this->birthday);
        return $birthDate->age;
    }


    public function supportExercises()
    {
        return $this->hasMany(Support_Exercise::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function staffRequests()
    {
        return $this->hasMany(StaffRequest::class, 'user_id');
    }



    /**
     * Gán vai trò cho người dùng 
     */
    public function assignRoleBasedOnField($userId)
    {
        // Tìm user theo ID
        $user = User::findOrFail($userId);

        // Kiểm tra giá trị của `role` và gán vai trò tương ứng
        switch ($user->role_012) {
            case 0:
                $user->assignRole('customer');
                break;
            case 1:
                $user->assignRole('staff');
                break;
            case 2:
                $user->assignRole('admin');
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Vai trò không hợp lệ.']);
        }

        return response()->json(['success' => true, 'message' => 'Vai trò đã được gán cho user.']);
    }

    public function userVideos()
    {
        return $this->hasMany(user_videos::class, 'user_id');
    }

    public function pt()
    {
        return $this->belongsTo(Staff::class, 'pt_id');
    }
}