<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsTeam extends Model
{
    use HasFactory;
    protected $table = "about_us_teams";
    protected $primaryKey = "id";
    protected $fillable = [
    'id','fullname','jobposition','instagramlink','linkedinlink','profilepicture' ];
}
