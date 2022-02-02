<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\OOPService;

class PhotoController extends Controller
{

    public function dashbord(OOPService $model)
    {
        return $model->dashbord();
    } 
    public function index2(Request $request, $id, OOPService $model)
    {
        return $model->show2($request, $id);
    }

    public function index2admins(Request $request, $id, OOPService $model)
    {
        return $model->index2admins($request, $id);
    }

    public function create2(Request $request, OOPService $model)
    {
        $request->validate([
            'firstname'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'seriya'=>'required|unique:teachers|min:9|max:9',
            'adress'=>'required',            
        ]);
        return $model->store2($request);
    }

    public function store2(Request $request, OOPService $model)
    {
        $request->validate([
            'payment'=>'required',
            'data'=>'required',
            'status'=>'required',
        ]);
        return $model->create2($request);                
    }  
 
    public function show2($id ,OOPService $model)
    {
        return $model->jami2($id);
    }

    public function edit2admin($id, OOPService $model)
    {
        return $model->edit2admin($id);    
    }

    public function update2(Request $request, $id, OOPService $model)
    {
        $request->validate([
            'firstname'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'seriya'=>'required|min:9|max:9',
            'adress'=>'required',            
        ]);
        return $model->updat($request, $id);
    }

    public function updatadmin(Request $request, $id, OOPService $model)
    {
        $request->validate([
            'firstname'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'seriya'=>'required|min:9|max:9',
            'adress'=>'required',            
        ]);
        return $model->updatadmin($request, $id);
    }
    
    public function destroy2($id, OOPService $model)
    {
        return $model->delete2($id);
    }

    public function destroy3($id, OOPService $model)
    {
        return $model->delete4($id);
    }
}
