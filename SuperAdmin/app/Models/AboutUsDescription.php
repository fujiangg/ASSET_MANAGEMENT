<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsDescription extends Model
{
    use HasFactory;
    protected $table = "about_us_descriptions";
    protected $primaryKey = "id";
    protected $fillable = [
    'id','description' ];
}
