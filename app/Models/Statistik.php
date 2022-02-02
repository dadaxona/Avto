<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;
    protected $table = 'statistiks';
    public $fillable = ['group','pulis','summa','summa2','qarz'];
    public $timestamps = true;
}