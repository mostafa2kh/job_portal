<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class employee extends Authenticatable
{
    use Notifiable;

    protected $table = 'employees';

    // تحديد الأعمدة القابلة للتحديث
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'department',
        'location',
        'phone_number',
    ];

    // تحديد الأعمدة المخفية مثل كلمة المرور


    // إذا كنت ترغب في إضافة خصائص أو طرق مخصصة، يمكنك إضافتها هنا
}
