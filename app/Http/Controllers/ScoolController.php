<?php

namespace App\Http\Controllers;

use App\Providers\OOPService;
use Illuminate\Http\Request;
use App\Http\Controllers\PhotoController;
use App\Models\Teacher;
use App\Models\Brend;

class ScoolController extends PhotoController
{
    public function group(Teacher $teacher)
    {
        return view('publis.oqituv',['data'=>$teacher->get()]);
    }

    public function guruhyaratish(OOPService $model)
    {
        return $model->guruhyaratish();
    }

    public function guruhyaratishadmin(OOPService $model)
    {
        return $model->guruhyaratishadmin();
    }

    public function groupadmin(Teacher $teacher)
    {
        return view('admin.oqituv',['data'=>$teacher->get()]);
    }

    public function index($id,OOPService $model)
    {      
        return $model->list($id);
    }

    public function indexadmine($id,OOPService $model)
    {      
        return $model->indexadmine($id);
    }

    public function indexs($id,OOPService $model)
    {      
        return $model->liste($id);
    }

    public function indexsadmin($id,OOPService $model)
    {      
        return $model->indexsadmin($id);
    }

    public function create(Request $request, OOPService $model)
    {
        return $model->store($request);    
    }

    public function createadmins(Request $request, OOPService $model)
    {
        return $model->createadmins($request);    
    }

    public function store(Request $request, OOPService $model)
    {
        $request->validate([        
            'number'=>'required|unique:groups',
            'category'=>'required',
            'summa'=>'required',
            'oqtuvci'=>'required',
            'qonstruq'=>'required',
            'qonstruq2'=>'required',
            'qonstruq3'=>'required',
            'mashina'=>'required',
            'mashina2'=>'required',
            'mashina3'=>'nullable',
            'data'=>'required',
            'data2'=>'required',
        ]);
        return $model->create($request);
    }

    public function creategroup(Request $request, OOPService $model)
    {
        $request->validate([        
            'number'=>'required|unique:groups',
            'category'=>'required',
            'summa'=>'required',
            'oqtuvci'=>'nullable',
            'qonstruq'=>'nullable',
            'qonstruq2'=>'nullable',
            'qonstruq3'=>'nullable',
            'mashina'=>'nullable',
            'mashina2'=>'nullable',
            'mashina3'=>'nullable',
            'data'=>'nullable',
            'data2'=>'nullable',
        ]);
        return $model->creategroup($request);
    }

    public function creategroupadmin(Request $request, OOPService $model)
    {
        $request->validate([        
            'number'=>'required|unique:groups',
            'category'=>'required',
            'summa'=>'required',
            'oqtuvci'=>'nullable',
            'qonstruq'=>'nullable',
            'qonstruq2'=>'nullable',
            'qonstruq3'=>'nullable',
            'mashina'=>'nullable',
            'mashina2'=>'nullable',
            'mashina3'=>'nullable',
            'data'=>'nullable',
            'data2'=>'nullable',
        ]);
        return $model->creategroupadmin($request);
    }


    public function show(Request $request, $id, OOPService $model)
    {
        return $model->show($request, $id);
    }

    public function showadmin(Request $request, $id, OOPService $model)
    {
        return $model->showadmin($request, $id);
    }

    public function edit($id, OOPService $model)
    {
        return $model->edit($id);
    }

    public function editadmiral($id, OOPService $model)
    {
        return $model->editadmiral($id);
    }

    public function editadmin($id, OOPService $model)
    {
        return $model->editadmin($id);
    }
    
    public function update(Request $request, $id, OOPService $model)
    {
        $request->validate([
            'group_id'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'seriya'=>'required|min:9|max:9',
            'adress'=>'required',            
        ]);
        return $model->update($request, $id);
    }

    public function updateadmirals(Request $request, $id, OOPService $model)
    {
        $request->validate([
            'group_id'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'seriya'=>'required|min:9|max:9',
            'adress'=>'required'
        ]);
        return $model->updateadmirals($request, $id);
    }

    public function storeupdate(Request $request, $id, OOPService $model)
    {
        $request->validate([        
            'number'=>'required',
            'category'=>'required',
            'summa'=>'required',
            'oqtuvci'=>'required',
            'qonstruq'=>'required',
            'qonstruq2'=>'required',
            'qonstruq3'=>'required',
            'mashina'=>'required',
            'mashina2'=>'required',
            'mashina3'=>'required',
            'data'=>'required',
            'data2'=>'required',
        ]);
        return $model->updated($request, $id);

    }

    public function storeupdateadmine(Request $request, $id, OOPService $model)
    {
        $request->validate([        
            'number'=>'required',
            'category'=>'required',
            'summa'=>'required',
            'oqtuvci'=>'required',
            'qonstruq'=>'required',
            'qonstruq2'=>'required',
            'qonstruq3'=>'required',
            'mashina'=>'required',
            'mashina2'=>'required',
            'mashina3'=>'required',
            'data'=>'required',
            'data2'=>'required',
        ]);
        return $model->storeupdateadmine($request, $id);

    }

    public function destroy(Request $request, $id, OOPService $model)
    {
        return $model->delete($request, $id);
    }
}
