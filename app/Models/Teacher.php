<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    public $fillable = ['firstname','phone','birthdata','seriya','adress','status','data','kundata'];
    public $timestamps = true;
}