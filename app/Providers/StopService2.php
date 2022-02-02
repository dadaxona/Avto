<?php

namespace App\Providers;
use App\Providers\StopService3;
use Carbon\Carbon;
class StopService2 extends StopService3
{   
    protected $pipls;
    protected $brend;
    protected $tolov;
    protected $teacher;
    protected $jamis;
    protected $model;
    protected $stati;
    protected $grupjamipay;
    public function jami2($id)
    {
        $data = $this->tolov->where('publi_id', $id)->paginate(10);
        $date = $this->pipls->where('id', $id)->first();
        $group = $this->model->where('id', $date->group_id)->where('category', $date->cagigory)->first();        
        $jami = $this->jamis->where('publi_id',$id)->first();
        return view('publis.payment',['date'=>$date, 'data'=>$data, 'group'=>$group, 'jami'=>$jami]);
    }

    public function list2($id)
    {
        $data = $this->tolov->where('publi_id', $id)->get();
        $date = $this->pipls->where('id', $id)->first();
        $jami = $this->jamis->whwre('publi_id', $id)->first();
        return view('publis.tolov',['col'=>$data, 'data'=>$date, 'jami'=>$jami]);       
    }

    public function edit2($id)
    {
        $data = $this->teacher->find($id);
        return view('publis.editoqtuvchi',['date'=>$data]);
    }
    public function edit2admin($id)
    {
        $data = $this->teacher->find($id);
        return view('admin.editoqtuvchi',['date'=>$data]);
    }
    public function store2($request)
    {
        unset($request["_token"]);
        $this->teacher->create($request->all());
        $userService = app()->make(OopServicePro::class);     
        return $userService->update($request);
    }
    public function updat($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $data = $this->teacher->find($id);
        $data->firstname = $request->firstname;
        $data->phone = $request->phone;
        $data->birthdata = $request->birthdata;
        $data->seriya = $request->seriya;
        $data->adress = $request->adress;       
        $data->save();        
        return redirect()->route('group')->with('success', 'Oqituvchi Muofaqiyatli Yangilandi');
    }

    public function updatadmin($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $data = $this->teacher->find($id);
        $data->firstname = $request->firstname;
        $data->phone = $request->phone;
        $data->birthdata = $request->birthdata;
        $data->seriya = $request->seriya;
        $data->adress = $request->adress;       
        $data->save();        
        return redirect()->route('groupadmin')->with('success', 'Oqituvchi Muofaqiyatli Yangilandi');
    }

    public function create2($request)
    {
        $group = $this->model->where('id',$request->group_id)->first();
        $tol = $this->jamis->where('publi_id',$request->publi_id)->first();
        $j = $tol->jamis + $request->payment;
        if($group->summa >= $j){
            unset($request["_token"]);
            unset($request["status"]);
            $this->tolov->create($request->all());
            return $this->update3($request);
        }elseif($group->summa < $j){
            return back()->with('err', 'Summa kop kiritildi');
        }
    }

    public function delete2($id)
    {       
        $this->tolov->find($id)->delete($id);
        return back()->with('success', 'O`qituvchi Muofaqiyatli O`chirildi');
    }

   
}
