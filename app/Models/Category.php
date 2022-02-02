<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public $fillable = ['firstname','phone','birthdata','seriya','adress','status','data','kundata'];
    public $timestamps = true;
}
