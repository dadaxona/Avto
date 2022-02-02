<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\OOPService;

class StatistikController extends Controller
{
    public function index(OOPService $model)
    {
        return $model->index();
    }

    public function indexbugalt(OOPService $model)
    {
        return $model->indexbugalt();
    }


    public function store(Request $request, OOPService $model)
    {
        $request->validate([
            'group_id'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'seriya'=>'required|min:9|max:9',
            'adress'=>'required',
            'jamis'=>'required',
        ]);
        return $model->stor2($request);
    }
    public function getlist(Request $request, OOPService $model)
    {
        return $model->showindex($request);
    }

    public function admingetlistsearch(Request $request, OOPService $model)
    {
        return $model->admingetlistsearch($request);
    }

    public function new(Request $request, OOPService $model)
    {
        return $model->stor3($request);
    }
    public function statusedit(OOPService $model)
    {
        return $model->statusedit();
    }

    public function adminstatusedit(OOPService $model)
    {
        return $model->adminstatusedit();
    }

    public function aktivticher($id, OOPService $model)
    {
        return $model->aktivticher($id);
    }

    public function aktivinstr($id, OOPService $model)
    {
        return $model->aktivinstr($id);
    }

    public function index44(OOPService $model)
    {
        return $model->index4();
    }
    public function index44admin(OOPService $model)
    {
        return $model->index44admin();
    }
    public function storecc(Request $request, OOPService $model)
    {
        return $model->storc($request);
    }

    public function storcadmin(Request $request, OOPService $model)
    {
        return $model->storcadmin($request);
    }

    public function avtoedit($id, OOPService $model)
    {
        return $model->jami44($id);
    }

    public function adminavtoedit($id, OOPService $model)
    {
        return $model->adminavtoedit($id);
    }

    public function storeccupdate(Request $request, $id, OOPService $model)
    {
        return $model->autoupdate($request, $id);
    }

    public function storeccupdateadmin(Request $request, $id, OOPService $model)
    {
        return $model->storeccupdateadmin($request, $id);
    }

    public function storeccdelete($id, OOPService $model)
    {
        return $model->autodelet($id);
    }
}
