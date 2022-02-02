<?php

namespace App\Providers;

use App\Providers\StopService;
use App\Models\Group;
use App\Models\Publis;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\Brend;
use App\Models\Admin;
use App\Models\Drektor;
use App\Models\Jamisumma;
use App\Models\Category;
use App\Models\Avto;
use App\Models\Statistik;
use App\Models\Grupjamisumma;

class OOPService extends StopService
{
    protected $drektor;
    protected $admin;
    protected $brend;
    protected $model;
    protected $pipls;
    protected $tolov;
    protected $teacher;
    protected $jamis;
    protected $catigor;
    protected $auto;
    protected $stati;
    protected $grupjamipay;
    
    public function __construct(Drektor $drektor, Admin $admin, Brend $bren, Group $group, Publis $pup, Payment $payment, Jamisumma $jami, Teacher $teach, Category $catigor, Avto $auto, Statistik $statistik, Grupjamisumma $grupjamisumma)
    {
        $this->drektor=$drektor;
        $this->admin=$admin;
        $this->brend=$bren;
        $this->model=$group;
        $this->pipls=$pup;
        $this->tolov=$payment;
        $this->teacher=$teach;
        $this->jamis=$jami;
        $this->catigor=$catigor;
        $this->auto=$auto;
        $this->stati=$statistik;
        $this->grupjamipay=$grupjamisumma;
    }
}