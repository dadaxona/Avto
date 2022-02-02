<?php

namespace App\Providers;
use Carbon\Carbon;
class ServiceContract
{   
    protected $model;
    protected $karzin;
    protected $zinapay;
    protected $payment;
    protected $arzinajami;
    protected $jamis;
    protected $pip;
    protected $stati;
    protected $grupjamipay;
    protected $teacher;
    protected $catigor;
    protected $auto;
    protected $drektor;
    protected $avtorasxot;

    public function index()
    {
        $brends = $this->drektor->select('login')->first();
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $pip = $this->pip->where('kundata',$kundata)->get();
        $pay = $this->payment->where('kundata',$kundata)->get();
        $tech = $this->teacher->where('kundata', $kundata)->get();
        $cate = $this->catigor->where('kundata', $kundata)->get();
        $auto = $this->auto->where('kundata', $kundata)->get();
        $autox = $this->avtorasxot->where('kundata', $kundata)->get();
        return view('drektor.kundalik',['brends'=>$brends, 'pip'=>$pip, 'pay'=>$pay, 'tech'=>$tech, 'cate'=>$cate, 'auto'=>$auto, 'autox'=>$autox]);
    }
    
    public function search($request)
    {
        unset($request["_token"]);
        $pip = $this->pip->where('kundata', $request->search)->get();
        $pay = $this->payment->where('kundata', $request->search)->get();
        $tech = $this->teacher->where('kundata', $request->search)->get();
        $cate = $this->catigor->where('kundata', $request->search)->get();
        $auto = $this->auto->where('kundata', $request->search)->get();
        $avto = $this->avtorasxot->where('kundata', $request->search)->get();
        $brends = $this->drektor->select('login')->first();
        return view('drektor.kundalik',['brends'=>$brends, 'pip'=>$pip, 'pay'=>$pay, 'tech'=>$tech, 'cate'=>$cate, 'auto'=>$auto, 'autox'=>$avto]);
    }

    public function create($request, $id)
    {
        $publis = $this->pip->find($id);
        $pay = $this->payment->where('publi_id',$publis->id)->where('group_id',$publis->group_id)->get();
        if($pay){
            unset($pay["updated_at"]);
            unset($pay["created_at"]);
            foreach($pay as $p){
            $this->zinapay->create([
                'publi_id'=>$p->publi_id,
                'group_id'=>$p->group_id,
                'firstname'=>$p->firstname,
                'lastname'=>$p->lastname,
                'payment'=>$p->payment,
                'data'=>$p->data,
                'kundata'=>$p->kundata
            ]);
           }
           $payme = $this->jamis->where('publi_id', $id)->where('group_id',$request->group_id)->first();
           $this->arzinajami->create([
               'publi_id'=>$payme->publi_id,
               'group_id'=>$payme->group_id,
               'jamis'=>$payme->jamis
           ]);
           unset($request["summa"]);
           $this->karzin->create($request->all());
           $this->pip->find($id)->delete($id);
           return back()->with('success', 'O`quvchi Muofaqiyatli O`chirildi');
        }else{
        $payme = $this->jamis->where('publi_id', $id)->where('group_id',$request->group_id)->first();
        $this->arzinajami->create([
            'publi_id'=>$payme->publi_id,
            'group_id'=>$payme->group_id,
            'jamis'=>$payme->jamis
        ]);
        unset($request["summa"]);
        $this->karzin->create($request->all());
        $this->pip->find($id)->delete($id);
        return back()->with('success', 'O`quvchi Muofaqiyatli O`chirildi');
        }
    }

    public function karzina()
    {
        $karzin = $this->karzin->all();
        return view('publis.karzina',['data'=>$karzin]);
    }

    public function admingetlist()
    {
        $karzin = $this->karzin->all();
        return view('admin.karzina',['data'=>$karzin]);
    }

    public function store($request, $id)
    {
        $gr = $this->grupjamipay->where('number', $request->group_id)->where('category', $request->cagigory)->first();
        $j = $gr->jamipay + $request->jamis;
        $this->grupjamipay->where('number', $request->group_id)->where('category', $request->cagigory)->update([
            'jamipay' => $j,
        ]);
        $sum = $this->model->where('number', $request->group_id)->where('category', $request->cagigory)->first();
        $dataid = $this->stati->where('id', 1)->first();
        $pulis = $dataid->pulis + 1;
        $summa = $dataid->summa + $sum->summa;
        $summa2 = $dataid->summa2 + $request->jamis;
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
        unset($request["summa"]);
        $this->pip->create([
            'group_id'=>$request->group_id,
            'cagigory'=>$request->cagigory,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'ochestvo'=>$request->ochestvo,
            'phone'=>$request->phone,
            'birthdata'=>$request->birthdata,
            'malumoti'=>$request->malumoti,
            'seriya'=>$request->seriya,
            'adress'=>$request->adress,
            'adress2'=>$request->adress2,
            'jamis'=>$request->jamis,
            'kundata'=>$request->kundata
        ]);
        $payid = $this->pip->where('group_id', $request->group_id)
                             ->where('seriya', $request->seriya)
                             ->first();
        $pay = $this->zinapay->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->get();
        if($pay){
            unset($pay["updated_at"]);
            unset($pay["created_at"]);
            foreach($pay as $p){
            $this->payment->create([
                'publi_id'=>$payid->id,
                'group_id'=>$p->group_id,
                'firstname'=>$p->firstname,
                'lastname'=>$p->lastname,
                'payment'=>$p->payment,
                'data'=>$p->data,
                'kundata'=>$p->kundata
            ]);
           }
           $payme = $this->arzinajami->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->first();
           $this->jamis->create([
               'publi_id'=>$payid->id,
               'group_id'=>$payme->group_id,
               'jamis'=>$payme->jamis
           ]);
           $this->arzinajami->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->delete();
           $this->zinapay->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->delete();
           $this->karzin->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->delete();
           return back()->with('success', 'O`chirilgan malumotlar muofaqiyatli tiklandi');
        }else{
        $payme = $this->arzinajami->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->first();
        $payid = $this->pip->where('group_id', $request->group_id)
                            ->where('seriya', $request->seriya)
                            ->first();
            $this->jamis->create([
                'publi_id'=>$payid->id,
                'group_id'=>$payme->group_id,
                'jamis'=>$payme->jamis
            ]);
            $this->arzinajami->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->delete();
            $this->zinapay->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->delete();
            $this->karzin->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->delete();
            return back()->with('success', 'O`chirilgan malumotlar muofaqiyatli tiklandi');
        }
    }

    public function update($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $this->teacher->where('seriya', $request->seriya)->update([
            'kundata' => $kundata
        ]);
        return back()->with('success', 'Oqituvchi qoshish muofaqiyatli amalga oshirildi');
    }

    public function update2($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $this->catigor->where('seriya', $request->seriya)->update([
            'kundata' => $kundata
        ]);
        return back()->with('success', 'Instrukto`r qo`shish muvofaqiyatli amalga oshirildi');
    }

    public function update2admin($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $this->catigor->where('seriya', $request->seriya)->update([
            'kundata' => $kundata
        ]);
        return back()->with('success', 'Instrukto`r qo`shish muvofaqiyatli amalga oshirildi');
    }

    public function update3($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $this->auto->where('mashina', $request->mashina)->where('nomer', $request->nomer)->update([
            'kundata' => $kundata
        ]);
     
        return back()->with('success', 'Avtomobil qoshish muofaqiyatli amalga oshirildi');
    }

    public function update4($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $this->pip->where('group_id', $request->group_id)->where('cagigory', $request->cagigory)->where('seriya', $request->seriya)->update([
            'kundata' => $kundata
        ]);
        return back()->with('success', 'Oquvchi qoshish muofaqiyatli amalga oshirildi');
    }

    public function update4admins($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $this->pip->where('group_id', $request->group_id)->where('cagigory', $request->cagigory)->where('seriya', $request->seriya)->update([
            'kundata' => $kundata
        ]);
        return back()->with('success', 'Oquvchi qoshish muofaqiyatli amalga oshirildi');
    }

    public function update5($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $this->payment->where('publi_id', $request->publi_id)->where('group_id', $request->group_id)->where('payment', $request->payment)->update([
            'kundata' => $kundata
        ]);
        return back()->with('success', 'Tolov Muofaqiyatli Amalga Oshirildi');
    }

    public function tozalashadmin($request)
    {
        if($request){
            $this->karzin->where('id', '>', 0)->delete();
            $this->zinapay->where('id', '>', 0)->delete();
            $this->arzinajami->where('id', '>', 0)->delete();
            return back()->with('success', 'Tozalash Muofaqiyatli Amalga Oshirildi');
        }
    }
    
    public function avto()
    {
        $avto = $this->auto->paginate(20);
        return view('publis.avtorashot',['avto'=>$avto]);
    }

    public function avtohisob($id)
    {
        $avtohisob = $this->auto->where('id', $id)->first();
        return view('publis.jamiavtorashot',['avtohisob'=>$avtohisob]);
    }

    public function oylikmalumot($id)
    {
        $dt = new Carbon();
        $carbon= $dt->year;
        $carbon2= $dt->month;
        $data = $this->auto->where('id', $id)->first();
        $avtohisob = $this->avtorasxot->whereYear('created_at', $carbon)->whereMonth('created_at', $carbon2)->paginate(31);
        return view('publis.avtomalumot',['avto'=>$avtohisob, 'date'=>$data]);
    }

    public function avtosearch($request)
    {        
        $data = $this->auto->where('id', $request->auto_id)->first();
        $avtohisob = $this->avtorasxot->whereYear('created_at', $request->data2)->whereMonth('created_at', $request->data)->paginate(31);
        return view('publis.avtomalumot',['avto'=>$avtohisob, 'date'=>$data]);
    }

    public function avtorasxot($request)
    {
        $dt = new Carbon();
        $kundata = $dt->toDateString();
        $data = $this->auto->where('id', $request->auto_id)->first();
        $this->avtorasxot->create([
            'mashina'=>$data->mashina,
            'nomer'=>$data->nomer,
            'avto_id'=>$request->auto_id,
            'data'=>$request->data,
            'masofa'=>$request->masofa,
            'finish'=>$request->finish,
            'benzin'=>$request->benzin,
            'solingan'=>$request->solingan,
            'masofav'=>$request->masofav,
            'benzinrashot'=>$request->benzinrashot,
            'qoldiqbenzin'=>$request->qoldiqbenzin,
            'kundata'=>$kundata
        ]);
        return redirect()->route('avto')->with('success', 'Malumotlar muvofaqoyatli kiritildi');
    }
}