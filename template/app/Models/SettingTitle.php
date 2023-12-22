<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTitle extends Model
{
    use HasFactory;

    protected $table = 'setting_titles';

    protected $fillable = [
        'dashboard_name',
    ];
}
