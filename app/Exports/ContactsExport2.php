<?php

namespace App\Exports;

use App\Models\Avtorasxot;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsExport2 implements FromCollection
{

    public $request;
    public function __construct($request)
    {
        $this->request = $request;  
    }

    public function collection()
    {
        $request = $this->request;
        return Avtorasxot::select('data','masofa','finish','benzin','solingan','masofav','benzinrashot','qoldiqbenzin')->where('avto_id', $request->id)->where('mashina', $request->mashina)->where('nomer', $request->nomer)->get();
    }
}