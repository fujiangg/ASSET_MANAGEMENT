<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $table = "footers";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','websitelogo','locationaddress','copyrightpage','privacypolicypage','termsofusepage','copyright'];
}
