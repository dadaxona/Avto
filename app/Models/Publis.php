<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publis extends Model
{
    use HasFactory;
    protected $table = 'publis';
    public $fillable = ['group_id','cagigory','firstname','lastname','ochestvo','phone','birthdata','malumoti','seriya','adress','adress2','jamis','kundata'];
    public $timestamps = true;
    public function jamisumma()
    {
        return $this->hasOne(Jamisumma::class);
    }
}
