<?php

namespace App\Providers;
use App\Providers\StopService4;
use Carbon\Carbon;
class StopService3 extends StopService4
{
    protected $model;
    protected $brend;
    protected $pipls;
    protected $tolov;
    protected $jamis;
    protected $teacher;
    protected $catigor;
    protected $stati;
    protected $grupjamipay;

    public function show2($request, $id)
    {
        $mode = $this->model->where('id', $id)->first();
        $summa = $this->grupjamipay->where('number', $request->number)->where('category', $request->category)->first();
        $jamisums = $this->pipls->where('group_id', $mode->id)->where('cagigory', $request->category)->first();
        if($jamisums->group_id == $mode->id && $jamisums->cagigory == $request->category){
            $firs = $this->pipls->where('group_id', $mode->id)->where('cagigory', $request->category)->paginate(25);
            return view('publis.tayyortolov',['data'=>$firs, 'date'=>$mode, 'sum'=>$summa]);
        }else{
            return back()->with('danger', 'Guruhda to\'lovlar amalga oshmagan');
        }
    }

    public function index2admins($request, $id)
    {
        $mode = $this->model->where('id', $id)->first();
        $summa = $this->grupjamipay->where('number', $request->number)->where('category', $request->category)->first();
        $jamisums = $this->pipls->where('group_id', $mode->id)->where('cagigory', $request->category)->first();
        if($jamisums->group_id == $mode->id && $jamisums->cagigory == $request->category){
            $firs = $this->pipls->where('group_id', $mode->id)->where('cagigory', $request->category)->paginate(25);
            return view('admin.tayyortolov',['data'=>$firs, 'date'=>$mode, 'sum'=>$summa]);
        }else{
            return back()->with('danger', 'Guruhda to\'lovlar amalga oshmagan');
        }
    }

    public function edit3($id)
    {
        $data = $this->tolov->find($id);
        return view('publis.edittolov',['date'=>$data]);
    }
    public function store($request)
    {
        $request->validate([
            'group_id'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'ochestvo'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'malumoti'=>'required',
            'seriya'=>'required|min:9|max:9',
            'adress'=>'required',
            'adress2'=>'required',
            'jamis'=>'required'
        ]);
        $data = $this->pipls->where('seriya', $request->seriya)->first();
        if($data){
            return $this->showw($data, $request);
        }else{
            $dataid = $this->stati->where('id', 1)->first();       
            if($dataid){
                $j = $dataid->pulis + 1;
                $sum = $dataid->summa + $request->summa;
                $qarz = $dataid->qarz + $request->summa;
                $this->stati->where('id', 1)->update([
                    'pulis'=>$j,
                    'summa'=>$sum,
                    'qarz'=>$qarz,
                ]);
            }
            unset($request["_token"]);
            unset($request["summa"]);
            $this->pipls->create($request->all());
            $data = $this->pipls->where('group_id', $request->group_id)->where('cagigory', $request->cagigory)->where('seriya', $request->seriya)->first();
            $this->jamis->create([
                'publi_id' => $data->id,
                'group_id' => $data->group_id,
                'jamis' => 0
            ]);
            $userService = app()->make(OopServicePro::class);     
            return $userService->update4($request);
        }
    }

    public function createadmins($request)
    {
        $request->validate([
            'group_id'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'ochestvo'=>'required',
            'phone'=>'required|min:9|max:9',
            'birthdata'=>'required',
            'malumoti'=>'required',
            'seriya'=>'required|min:9|max:9',
            'adress'=>'required',
            'adress2'=>'required',
            'jamis'=>'required'
        ]);
        $data = $this->pipls->where('seriya', $request->seriya)->first();
        if($data){
            return $this->showw($data, $request);
        }else{
            $dataid = $this->stati->where('id', 1)->first();       
            if($dataid){
                $j = $dataid->pulis + 1;
                $sum = $dataid->summa + $request->summa;
                $qarz = $dataid->qarz + $request->summa;
                $this->stati->where('id', 1)->update([
                    'pulis'=>$j,
                    'summa'=>$sum,
                    'qarz'=>$qarz,
                ]);
            }
            unset($request["_token"]);
            unset($request["summa"]);
            $this->pipls->create($request->all());
            $data = $this->pipls->where('group_id', $request->group_id)->where('cagigory', $request->cagigory)->where('seriya', $request->seriya)->first();
            $this->jamis->create([
                'publi_id' => $data->id,
                'group_id' => $data->group_id,
                'jamis' => 0
            ]);
            $userService = app()->make(OopServicePro::class);     
            return $userService->update4admins($request);
        }
    }

    public function showw($data, $request)
    {
        $mode = $this->model->where('id', $request->group_id)->first();        
        $data = $this->pipls->where('seriya', $data->seriya)->first();
        $date = $this->model->where('id', $data->group_id)->first();    
        return view('publis.mavjud',['mode'=>$mode, 'item'=>$data, 'date'=>$date, 'req'=>$request]);
    }   

    public function update3($request)
    {
        $data = $this->jamis->where('publi_id',$request->publi_id)->first();
        $j = $data->jamis + $request->payment;
        $this->jamis->where('publi_id',$request->publi_id)->update([
            'publi_id' => $request->publi_id,
            'jamis' => $j
        ]);        
        $sum = $this->jamis->where('publi_id', $request->publi_id)->first();
        $this->pipls->where('id', $request->publi_id)->update([
            'jamis' => $sum->jamis
        ]);
        $gr = $this->grupjamipay->where('number', $request->group_id)->where('category', $request->category)->first();
        $j = $gr->jamipay + $request->payment;
        $this->grupjamipay->where('number', $request->group_id)->where('category', $request->category)->update([
            'jamipay' => $j,
        ]);
        $dataid = $this->stati->where('id', 1)->first();               
        $pay = $dataid->summa2 + $request->payment;
        $qarz = $dataid->qarz - $request->payment;
        $this->stati->where('id', 1)->update([
            'summa2'=>$pay,
            'qarz'=>$qarz
        ]);
        $userService = app()->make(OopServicePro::class);
        return $userService->update5($request);
    } 

    public function delete3($request, $id)
    {
        $dataid = $this->stati->where('id', 1)->first();               
        $pay = $dataid->summa2 - $request->payment;
        $qarz = $dataid->qarz + $request->payment;            
        $this->stati->where('id', 1)->update([
            'summa2'=>$pay,
            'qarz'=>$qarz
        ]);
        $data = $this->jamis->where('publi_id', $request->publi_id)->first();
        $del = $this->tolov->where('id', $id)->first();    
        $this->jamis->where('publi_id', $request->publi_id)->update([
            'jamis' => $data->jamis - $del->payment
        ]);
        $sum = $this->jamis->where('publi_id', $request->publi_id)->first();
        $this->pipls->where('id', $request->publi_id)->update([
            'jamis' => $sum->jamis
        ]);        
        $rest = $this->grupjamipay->where('number', $request->group_id)->where('category', $request->category)->first();
        $j = $rest->jamipay - $request->payment;
        $this->grupjamipay->where('number', $request->group_id)->where('category', $request->category)->update([
            'jamipay' => $j
        ]);
        $this->tolov->find($id)->delete($id);
        return back()->with('success', 'Oqituvchi Muofaqiyatli Ochirildi');
    }

    public function delete4($id)
    {
        $this->teacher->find($id)->delete($id);
        return back()->with('success', 'Oqituvchi Muofaqiyatli Ochirildi'); 
    }
    // Qonstructor

    public function index3()
    {
        $cati = $this->catigor->all();
        return view('publis.qonstruq',['data'=>$cati]);      
    }
    
    public function adminindex()
    {
        $cati = $this->catigor->all();
        return view('admin.qonstruq',['data'=>$cati]);      
    }
    public function jami3($id)
    {
        $date = $this->catigor->find($id);
        return view('publis.qonstruqedit',['date'=>$date]);
    }
    public function adminjami3($id)
    {
        $date = $this->catigor->find($id);
        return view('admin.qonstruqedit',['date'=>$date]);
    }


    public function update5($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $data = $this->catigor->find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->birthdata = $request->birthdata;
        $data->seriya = $request->seriya;
        $data->adress = $request->adress;
        $data->save();
        return redirect()->route('jamisum.index')->with('success', 'Instrukto`r muvofaqiyatli yangilandi');
    }

    public function update2admin($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $data = $this->catigor->find($id);
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->phone = $request->phone;
        $data->birthdata = $request->birthdata;
        $data->seriya = $request->seriya;
        $data->adress = $request->adress;
        $data->save();
        return redirect()->route('adminindex')->with('success', 'Instrukto`r muvofaqiyatli yangilandi');
    }

    public function store3($request)
    {
        unset($request["_token"]);
        $this->catigor->create($request->all());
        $userService = app()->make(OopServicePro::class);     
        return $userService->update2($request);
    }

    public function createadmin($request)
    {
        unset($request["_token"]);
        $this->catigor->create($request->all());
        $userService = app()->make(OopServicePro::class);     
        return $userService->update2admin($request);
    }


    public function delete5($id)
    {
        $this->catigor->find($id)->delete($id);
        return back()->with('success', 'Instrukto`r muvofaqiyatli o`chirildi');
    }
}
