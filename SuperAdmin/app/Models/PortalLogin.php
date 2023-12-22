<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortalLogin extends Model
{
    use HasFactory;
    protected $table = "portal_logins";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','projectname','projectlink'
    ];
}
