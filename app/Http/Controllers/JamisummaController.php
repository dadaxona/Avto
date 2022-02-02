<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\OOPService;
use App\Http\Controllers\PhotoController;

class JamisummaController extends PhotoController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OOPService $model)
    {
        return $model->index3();
    }

    public function adminindex(OOPService $model)
    {
        return $model->adminindex();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, OOPService $model)
    {
        $request->validate([
            'firstname'=>'required',       
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'seriya'=>'required|unique:categories|min:9|max:9',
            'adress'=>'required',
        ]);
        return $model->store3($request);
    }
 
    public function createadmin(Request $request, OOPService $model)
    {
        $request->validate([
            'firstname'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'seriya'=>'required|unique:categories|min:9|max:9',
            'adress'=>'required',
        ]);
        return $model->createadmin($request);
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, OOPService $model)
    {
        return $model->jami3($id);        
    }

    public function adminjami3($id, OOPService $model)
    {
        return $model->adminjami3($id);        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, OOPService $model)
    {
        return $model->edit3($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, OOPService $model)
    {
        // return $model->update4($request, $id);
    }

    public function update2(Request $request, $id, OOPService $model)
    {
        return $model->update5($request, $id);
    }

    public function update2admin(Request $request, $id, OOPService $model)
    {
        return $model->update2admin($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, OOPService $model)
    {
        return $model->delete3($request, $id);
    }

    public function destroy2($id, OOPService $model)
    {
        return $model->delete5($id);
    }
}
