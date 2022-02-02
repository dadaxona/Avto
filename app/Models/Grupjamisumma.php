<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupjamisumma extends Model
{
    use HasFactory;
    protected $table = 'grupjamisummas';
    public $fillable = ['number','category','jamipay'];
    public $timestamps = true;
}