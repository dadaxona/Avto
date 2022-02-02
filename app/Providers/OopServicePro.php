<?php

namespace App\Providers;

use App\Providers\ServiceContract;


use App\Models\Group;
use App\Models\Publis;
use App\Models\Payment;
use App\Models\Jamisumma;
use App\Models\Statistik;
use App\Models\Karzina;
use App\Models\Karzinapay;
use App\Models\Karzinajami;
use App\Models\Grupjamisumma;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Avto;
use App\Models\Admin;
use App\Models\Drektor;
use App\Models\Avtorasxot;
use App\Models\Avtorasxotjami;
class OopServicePro extends ServiceContract
{
    protected $model;
    protected $karzin;
    protected $zinapay;
    protected $payment;
    protected $arzinajami;
    protected $jamis;
    protected $pip;
    protected $stati;
    protected $grupjamipay;
    protected $teacher;
    protected $catigor;
    protected $auto;
    protected $drektor;
    protected $admin;
    protected $avtorasxot;


    public function __construct(Drektor $drektor, Admin $admin, Teacher $teach, Category $catigor, Avto $auto, Group $group, Karzina $karzin, Karzinapay $zinapay, Karzinajami $arzinajami, Payment $payment, Jamisumma $jami, Publis $pip, Statistik $stati, Grupjamisumma $grupjamisumma, Avtorasxot $avtorasxot)
    {
        $this->drektor=$drektor;
        $this->admin=$admin;
        $this->teacher=$teach;
        $this->catigor=$catigor;
        $this->auto=$auto;
        $this->karzin=$karzin;
        $this->model=$group;
        $this->zinapay=$zinapay;
        $this->arzinajami=$arzinajami;
        $this->payment=$payment;
        $this->pip=$pip;
        $this->jamis=$jami;
        $this->stati=$stati;   
        $this->grupjamipay=$grupjamisumma;
        $this->avtorasxot=$avtorasxot;
    
    }
}