<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ContactsExport;
use App\Exports\ContactsExport2;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller 
{

    public function export(Request $request) 
    {
        return Excel::download(new ContactsExport($request), 'contacts.xlsx');
    }

    public function exports(Request $request) 
    {
        return Excel::download(new ContactsExport2($request), 'contacts.xlsx');
    }
}