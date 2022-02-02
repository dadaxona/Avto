<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $fillable = ['publi_id','group_id','firstname','lastname','payment','data','kundata'];
    public $timestamps = true;

    public function pay()
    {
        return $this->belongsTo(Publis::class);
    }
}
