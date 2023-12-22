<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsCard2 extends Model
{
    use HasFactory;
    protected $table = "Contact_Us_Card2s";
    protected $primaryKet = "id";
    protected $fillable = [
        'id','cardtitle','carddescription'];
}
