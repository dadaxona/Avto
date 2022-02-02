<?php

namespace App\Providers;
use App\Providers\StopService2;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class StopService extends StopService2
{   
    protected $drektor;
    protected $admin;
    protected $brend;
    protected $model;
    protected $pipls;
    protected $teacher;
    protected $jamis;
    protected $catigor;
    protected $auto;
    protected $stati;
    protected $grupjamipay;
    public function dashbord()
    {
      $brends = array();
      if (Session::has('IDIE')) {
        $brends = $this->drektor->where('id','=',Session::get('IDIE'))->first();
        $col = $this->model->orderBy('id','DESC')->paginate(6);
        // $collection = $this->teacher->all();
        // $construq = $this->catigor->all();
        $collection = $this->teacher->where('status', 0)->get();
        $construq = $this->catigor->where('status', 0)->get();
        $auto = $this->auto->all();
        $data = $this->stati->where('id', 1)->first();
        return view('drektor.loginoyna',['static' => $data, 'brends'=>$brends, 'col'=>$col, 'auto'=>$auto, 'collection'=>$collection, 'cons'=>$construq]);

      }elseif(Session::has('ID')){
        $brends = $this->admin->where('id','=',Session::get('ID'))->first();
        $col = $this->model->orderBy('id','DESC')->paginate(6);
        // $collection = $this->teacher->all();
        // $construq = $this->catigor->all();
        $collection = $this->teacher->where('status', 0)->get();
        $construq = $this->catigor->where('status', 0)->get();
        $auto = $this->auto->all();
        return view('admin.malumotadmin',['brends'=>$brends, 'col'=>$col, 'auto'=>$auto, 'collection'=>$collection, 'cons'=>$construq]);

      }elseif(Session::has('loginID')){
        $brends = $this->brend->where('id','=',Session::get('loginID'))->first();
        $col = $this->model->orderBy('id','DESC')->paginate(6);
        // $collection = $this->teacher->all();
        // $construq = $this->catigor->all();
        $collection = $this->teacher->where('status', 0)->get();
        $construq = $this->catigor->where('status', 0)->get();
        $auto = $this->auto->all();
        return view('publis.malumot',['brends'=>$brends, 'col'=>$col, 'auto'=>$auto, 'collection'=>$collection, 'cons'=>$construq]);
        }
    }

    public function guruhyaratish()
    {
        $collection = $this->teacher->where('status', 0)->get();
        $construq = $this->catigor->where('status', 0)->get();
        $auto = $this->auto->all();
        return view('publis.guruhyaratishaktiv',['auto'=>$auto, 'collection'=>$collection, 'cons'=>$construq]);    
    }

    public function guruhyaratishadmin()
    {
        $collection = $this->teacher->where('status', 0)->get();
        $construq = $this->catigor->where('status', 0)->get();
        $auto = $this->auto->all();
        return view('admin.guruhyaratishaktiv',['auto'=>$auto, 'collection'=>$collection, 'cons'=>$construq]);    
    }

    public function list($id)
    {
        $count = $this->pipls->where('group_id', $id)->count();
        if($count >= 25){
            return redirect('/dashbord')->with('file', 'Guruh To`lgan');
        }else{
            return view('publis.publis',['count'=>$count ,'date'=>$this->model->where('number',$id)->first()]);
        }
    }

    public function indexadmine($id)
    {
        $count = $this->pipls->where('group_id', $id)->count();
        if($count >= 25){
            return redirect('/admin')->with('file', 'Guruh To`lgan');
        }else{
            return view('admin.publis',['count'=>$count ,'date'=>$this->model->where('number',$id)->first()]);
        }
    }

    public function liste($id)
    {
        // $collection = $this->teacher->all();
        // $construq = $this->catigor->all();
        $collection = $this->teacher->all();
        $construq = $this->catigor->all();
        $auto = $this->auto->all();
        $col = $this->model->where('id',$id)->first();
        return view('publis.guruhedit',['col'=>$col, 'collection'=>$collection, 'cons'=>$construq, 'auto'=>$auto]);
    }

    public function indexsadmin($id)
    {
        // $collection = $this->teacher->all();
        // $construq = $this->catigor->all();
        $collection = $this->teacher->all();
        $construq = $this->catigor->all();
        $auto = $this->auto->all();
        $col = $this->model->where('id',$id)->first();
        return view('admin.guruhedit',['col'=>$col, 'collection'=>$collection, 'cons'=>$construq, 'auto'=>$auto]);
    }

    public function show($request, $id)
    {
        // $f = $this->pipls->where('group_id', $request->number)->where('cagigory', $request->category)->first();
        // if($f){
            $data = $this->pipls->where('group_id', $request->number)
                                ->where('cagigory', $request->category)
                                ->paginate(25);                            
            $count = $this->pipls->where('group_id', $request->number)->count();
            $date = $this->model->where('number', $id)->first();
            $jami = $this->jamis->where('publi_id', $id)->first();
            return view('publis.oquv',['data'=>$data, 'counter'=>$count, 'date'=>$date, 'jami'=>$jami]);
        // }          
    }

    public function showadmin($request, $id)
    {
        // $f = $this->pipls->where('group_id', $request->number)->where('cagigory', $request->category)->first();
        // if($f){
            $data = $this->pipls->where('group_id', $request->number)
                                ->where('cagigory', $request->category)
                                ->paginate(25);                            
            $count = $this->pipls->where('group_id', $request->number)->count();
            $date = $this->model->where('number', $id)->first();
            $jami = $this->jamis->where('publi_id', $id)->first();
            return view('admin.oquv',['data'=>$data, 'counter'=>$count, 'date'=>$date, 'jami'=>$jami]);
        // }          
    }

    public function edit($id)
    {
        $data = $this->pipls->find($id);
        $mode = $this->model->where('number', $data->group_id)->where('category', $data->cagigory)->first();
        return view('publis.editoquv',['date'=>$data, 'data'=>$mode]);
    }

    public function editadmiral($id)
    {
        $data = $this->pipls->find($id);
        $mode = $this->model->where('number', $data->group_id)->where('category', $data->cagigory)->first();
        return view('admin.editoquv',['date'=>$data, 'data'=>$mode]);
    }

    public function editadmin($id)
    {
        $data = $this->pipls->find($id);
        $mode = $this->model->where('number', $data->group_id)->where('category', $data->cagigory)->first();
        return view('admin.editoquv',['date'=>$data, 'data'=>$mode]);
    }

    public function creategroup($request)
    {
        $this->model->create($request->all());
        $this->grupjamipay->create([
            'number'=>$request->number,
            'category'=>$request->category,
            'jamipay'=>0
        ]);    
        $dataid = $this->stati->where('id', 1)->first();       
        if($dataid){
            $j = $dataid->group + 1;            
            $this->stati->where('id', 1)->update([
                'group'=>$j,              
            ]);
        }else{
            $this->stati->create([
                'group'=>1,
                'pulis'=>0,
                'summa'=>0,
                'summa2'=>0,
                'qarz'=>0
            ]);
        }
        $this->catigor->where('id', $request->qonstruq)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq2)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq2)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);

        return back()->with('success', 'Yangi Guruh Muofaqiyatli Yaratildi');
    }

    public function creategroupadmin($request)
    {
        $this->model->create($request->all());
        $this->grupjamipay->create([
            'number'=>$request->number,
            'category'=>$request->category,
            'jamipay'=>0
        ]);    
        $dataid = $this->stati->where('id', 1)->first();       
        if($dataid){
            $j = $dataid->group + 1;            
            $this->stati->where('id', 1)->update([
                'group'=>$j,              
            ]);
        }else{
            $this->stati->create([
                'group'=>1,
                'pulis'=>0,
                'summa'=>0,
                'summa2'=>0,
                'qarz'=>0
            ]);
        }
        $this->catigor->where('id', $request->qonstruq)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq2)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq2)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        return back()->with('success', 'Yangi Guruh Muofaqiyatli Yaratildi');
    }

    public function create($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $tiche = $this->teacher->where('id', $request->oqtuvci)->first();
        $instr = $this->catigor->where('id', $request->qonstruq)->first();
        $instr2 = $this->catigor->where('id', $request->qonstruq2)->first();
        $instr3 = $this->catigor->where('id', $request->qonstruq3)->first();
        $this->model->create([
            'number'=>$request->number,
            'category'=>$request->category,
            'summa'=>$request->summa,
            'oqtuvci'=>$tiche->firstname,
            'qonstruq'=>$instr->firstname,
            'qonstruq2'=>$instr2->firstname,
            'qonstruq3'=>$instr3->firstname,
            'mashina'=>$request->mashina,
            'mashina2'=>$request->mashina2,
            'mashina3'=>$request->mashina3,
            'data'=>$request->data,
            'data2'=>$request->data2,
            'kundata'=>$kundata
        ]);
        $this->grupjamipay->create([
            'number'=>$request->number,
            'category'=>$request->category,
            'jamipay'=>0
        ]);    
        $dataid = $this->stati->where('id', 1)->first();       
        if($dataid){
            $j = $dataid->group + 1;            
            $this->stati->where('id', 1)->update([
                'group'=>$j,              
            ]);
        }else{
            $this->stati->create([
                'group'=>1,
                'pulis'=>0,
                'summa'=>0,
                'summa2'=>0,
                'qarz'=>0
            ]);
        }
        $this->catigor->where('id', $request->qonstruq)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq2)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq2)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        return back()->with('success', 'Yangi Guruh Muofaqiyatli Yaratildi');
    }

    public function update($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $data = $this->pipls->find($id);
        $data->group_id = $request->group_id;
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->ochestvo = $request->ochestvo;
        $data->phone = $request->phone;
        $data->birthdata = $request->birthdata;
        $data->malumoti = $request->malumoti;
        $data->seriya = $request->seriya;
        $data->adress = $request->adress;
        $data->adress2 = $request->adress2;
        $data->save();        
        return back()->with('success', 'O`quvchi Muofaqiyatli Yangilandi');
    }
    
    public function updateadmirals($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $data = $this->pipls->find($id);
        $data->group_id = $request->group_id;
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->ochestvo = $request->ochestvo;
        $data->phone = $request->phone;
        $data->birthdata = $request->birthdata;
        $data->malumoti = $request->malumoti;
        $data->seriya = $request->seriya;
        $data->adress = $request->adress;
        $data->adress2 = $request->adress2;
        $data->save();         
        return back()->with('success', 'O`quvchi Muofaqiyatli Yangilandi');
    }
    
    public function updated($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $tiche = $this->teacher->where('id', $request->oqtuvci)->first();
        $instr = $this->catigor->where('id', $request->qonstruq)->first();
        $instr2 = $this->catigor->where('id', $request->qonstruq2)->first();
        $instr3 = $this->catigor->where('id', $request->qonstruq3)->first();
        $data = $this->model->find($id);
        $data->number = $request->number;
        $data->category = $request->category;
        $data->summa = $request->summa;
        $data->oqtuvci = $tiche->firstname;
        $data->qonstruq = $instr->firstname;
        $data->qonstruq2 = $instr2->firstname;
        $data->qonstruq3 = $instr3->firstname;
        $data->mashina = $request->mashina;
        $data->mashina2 = $request->mashina2;
        $data->mashina3 = $request->mashina3;     
        $data->data = $request->data;
        $data->data2 = $request->data2;
        $data->save();
        $this->pipls->where('group_id', $request->number)->update([
            'cagigory' => $request->category
        ]);
        $this->grupjamipay->where('number', $request->number)->update([
            'category' => $request->category
        ]);
        $this->teacher->where('id', $request->oqtuvci)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq2)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq3)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        return redirect('dashbord')->with('success', 'Guruh Muofaqiyatli Yangilandi');
    }

    public function storeupdateadmine($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $tiche = $this->teacher->where('id', $request->oqtuvci)->first();
        $instr = $this->catigor->where('id', $request->qonstruq)->first();
        $instr2 = $this->catigor->where('id', $request->qonstruq2)->first();
        $instr3 = $this->catigor->where('id', $request->qonstruq3)->first();
        $data = $this->model->find($id);
        $data->number = $request->number;
        $data->category = $request->category;
        $data->summa = $request->summa;
        $data->oqtuvci = $tiche->firstname;
        $data->qonstruq = $instr->firstname;
        $data->qonstruq2 = $instr2->firstname;
        $data->qonstruq3 = $instr3->firstname;
        $data->mashina = $request->mashina;
        $data->mashina2 = $request->mashina2;
        $data->mashina3 = $request->mashina3;     
        $data->data = $request->data;
        $data->data2 = $request->data2;
        $data->save();
        $this->pipls->where('group_id', $request->number)->update([
            'cagigory' => $request->category
        ]);
        $this->grupjamipay->where('number', $request->number)->update([
            'category' => $request->category
        ]);
        $this->catigor->where('id', $request->qonstruq)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq2)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        $this->catigor->where('id', $request->qonstruq3)->update([
            'status'=>$request->status,
            'data'=>$request->data2,
        ]);
        return redirect('admin')->with('success', 'Guruh Muofaqiyatli Yangilandi');
    }

    public function delete($request, $id)
    {

        $gr = $this->grupjamipay->where('number', $request->group_id)->where('category', $request->cagigory)->first();
        $j = $gr->jamipay - $request->jamis;
        $this->grupjamipay->where('number', $request->group_id)->where('category', $request->cagigory)->update([
            'jamipay' => $j,
        ]);
        $dataid = $this->stati->where('id', 1)->first();
        $pulis = $dataid->pulis - 1;
        $summa = $dataid->summa - $request->summa;
        $summa2 = $dataid->summa2 - $request->jamis;
        $this->stati->where('id', 1)->update([
            'pulis'=>$pulis,
            'summa'=>$summa,
            'summa2'=>$summa2,
        ]);
        $d = $this->stati->where('id', 1)->first();
        $jjj = $d->summa - $d->summa2;
        $this->stati->where('id', 1)->update([
            'qarz'=>$jjj
        ]);    
        $userService = app()->make(OopServicePro::class);     
        return $userService->create($request, $id);
    }
}
