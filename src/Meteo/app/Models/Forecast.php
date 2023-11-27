<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
    php artisan make:model Forecast --migration
*/
class Forecast extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
}
