<?php

namespace App\Exports;

use App\Models\Publis;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsExport implements FromCollection
{

    public $request;
    public function __construct($request)
    {
        $this->request = $request;  
    }

    public function collection()
    {
        $request = $this->request;
        return Publis::select('firstname','lastname','ochestvo','birthdata','malumoti','adress','adress2')->where('group_id', $request->group_id)->where('cagigory', $request->category)->get();
    }
}