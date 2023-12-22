<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsCard1 extends Model
{
    use HasFactory;
    protected $table = "contact_us_card1s";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','cardtitle','carddescription','day','time','phonenumber','emailaddress','locationaddress','facebooklink','twitterlink','instagramlink','linkedinlink'];
}
