<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'title',
        'description',
        'skills',
        'status',
    ];

    protected $casts = [
        'skills' => 'array', // لتحويل المهارات من JSON إلى مصفوفة
    ];

    public function employee()
    {
        return $this->belongsTo(employee::class);
    }

    public function applications()
    {
        return $this->hasMany(application::class);
    }
}