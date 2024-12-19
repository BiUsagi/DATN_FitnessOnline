<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
class Staff extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'staff';

    // Khóa chính
    protected $primaryKey = 'id';

    // Các thuộc tính
    protected $fillable = [
        'user_id',
        'staff_name',
        'email',
        'avatar',
        'gender',
        'birthday',
        'introduction',
        'rating',
        'rating_count',
        'address',
        'password',
        'phone_number',
        'created_at',
        'updated_at',
    ];

    // Ẩn mật khẩu
    protected $hidden = [
        'password',
    ];

    // Kiểu dữ liệu
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'gender' => 'integer',
        'rating' => 'float',
        'rating_count' => 'integer'
    ];


    // Phương thức tính tuổi từ ngày sinh
    public function getAgeFromBirthday()
    {
        $birthDate = Carbon::parse($this->birthday);
        return $birthDate->age;
    }


    // Tính thời gian họạt động
    public function getActiveDuration()
    {
        Carbon::setLocale('vi');
        $createdAt = $this->created_at;
        $now = Carbon::now();
        return $createdAt->diffForHumans($now, true);
    }

    // Tính số lượng học viên 
    public function getStudentCount()
    {
        return $this->workoutPackages->sum(function ($package) {
            return $package->getStudentCount();
        });
    }

    // Tính số lượng khóa học
    public function getCourseCount()
    {
        return $this->workoutPackages()->count();
    }

    // lấy tất cả học viên
    public function getStudentsByStaff($staffId)
    {
        $staff = Staff::with(['workoutPackages.orders.user'])->find($staffId);

        $students = collect();
        foreach ($staff->workoutPackages as $package) {
            foreach ($package->orders as $order) {
                $students->push($order->user);
            }
        }
        return $students;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supportExercises()
    {
        return $this->hasMany(Support_Exercise::class, 'staff_id');
    }

    public function workoutPackages()
    {
        return $this->hasMany(Workout_Package::class, 'staff_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'staff_id'); // 'staff_id' là khóa ngoại trong bảng orders
    }
}