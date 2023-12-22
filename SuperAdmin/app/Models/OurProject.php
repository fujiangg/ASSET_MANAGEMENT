<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurProject extends Model
{
    use HasFactory;
    protected $table = "our_projects";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','projectname','projectdescription','projectimage'];
}
