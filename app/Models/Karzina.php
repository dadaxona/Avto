<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzina extends Model
{
    use HasFactory;
    protected $table = 'karzinas';
    public $fillable = ['publi_id','group_id','cagigory','firstname','lastname','ochestvo','phone','birthdata','malumoti','seriya','adress','adress2','jamis','kundata'];
    public $timestamps = true;
}