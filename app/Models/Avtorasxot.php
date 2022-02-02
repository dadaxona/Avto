<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avtorasxot extends Model
{
    use HasFactory;
    protected $table = 'avtorasxots';
    public $fillable = ['mashina','nomer','avto_id','data','masofa','finish','benzin','solingan','masofav','benzinrashot','qoldiqbenzin','kundata'];
    public $timestamps = true;
}