<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzinapay extends Model
{
    use HasFactory;
    protected $table = 'karzinapays';
    public $fillable = ['publi_id','group_id','firstname','lastname','payment','data','kundata'];
    public $timestamps = true;
}
