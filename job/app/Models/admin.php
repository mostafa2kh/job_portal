<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'admin';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    // Hide sensitive attributes like password

}
