<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    public $fillable = ['number','category','summa','oqtuvci','qonstruq','qonstruq2','qonstruq3','mashina','mashina2','mashina3','data','data2','kundata'];
    public $timestamps = true;

    public function publi()
    {
        return $this->hasOne(Publis::class);
    }
}