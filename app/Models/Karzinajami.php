<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karzinajami extends Model
{
    use HasFactory;
    protected $table = 'karzinajamis';
    public $fillable = ['publi_id','group_id','jamis'];
    public $timestamps = true;
}
