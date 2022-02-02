<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\OopServicePro;

class KarzinaController extends Controller
{
    public function indexoz(OopServicePro $model)
    {
        return $model->index();
    }

    public function search(Request $request, OopServicePro $model)
    {
        $request->validate([
            'search'=>'required'
        ]);
        return $model->search($request);
    }

    public function getlist(OopServicePro $model)
    {
        return $model->karzina();
    }

    public function admingetlist(OopServicePro $model)
    {
        return $model->admingetlist();
    }

    public function creates(Request $request, $id, OopServicePro $model)
    {
        return $model->store($request, $id);
    }

    public function tozalashadmin(Request $request, OopServicePro $model)
    {
        return $model->tozalashadmin($request);
    }

    public function avto(OopServicePro $model)
    {
        return $model->avto();
    }

    public function avtosearch(Request $request, OopServicePro $model)
    {
        return $model->avtosearch($request);
    }

    public function avtohisob($id, OopServicePro $model)
    {
        return $model->avtohisob($id);
    }

    public function oylikmalumot($id, OopServicePro $model)
    {
        return $model->oylikmalumot($id);
    }
    public function avtorasxot(Request $request, OopServicePro $model)
    {
    
        $request->validate([
            'auto_id'=>'nullable',       
            'data'=>'required',
            'masofa'=>'required',
            'finish'=>'required',
            'benzin'=>'required',
            'solingan'=>'required',
            'masofav'=>'required',
            'benzinrashot'=>'required',
            'qoldiqbenzin'=>'required',
        ]);
        return $model->avtorasxot($request);
    }
}
