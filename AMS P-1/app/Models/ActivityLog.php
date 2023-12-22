<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ActivityLog extends Model
{
    use HasFactory, Userstamps;

    protected $table = 'activity_log';

    public function users()
    {
        return $this->belongsTo(User::class, 'causer_id');
    } 
}

