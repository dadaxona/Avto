<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamisumma extends Model
{
    use HasFactory;
    protected $table = 'jamisummas';
    public $fillable = ['publi_id','group_id','jamis'];
    public $timestamps = true;

    public function pupilse()
    {
        return $this->belongsTo(Publis::class);
    }
}