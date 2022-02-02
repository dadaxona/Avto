<?php

namespace App\Providers;
use Carbon\Carbon;
class StopService4
{
    protected $model;
    protected $brend;
    protected $pipls;
    protected $tolov;
    protected $jamis;
    protected $teacher;
    protected $catigor;
    protected $auto;
    protected $drektor;
    protected $stati;
    protected $grupjamipay;

    public function index()
    {
        $data = $this->stati->where('id', 1)->first();
        $teacher = $this->teacher->all()->count();
        $catigor = $this->catigor->all()->count();
        $auto = $this->auto->all()->count();
        if($data){
            return view('drektor.statis', ['static' => $data, 'teacher'=>$teacher, 'catigor'=>$catigor, 'auto'=>$auto]);
        }else{
            return back()->with('danger', 'Hozirda statistika malumotlarini ko\'ra olmaysiz. Statistikani ko\'rishingiz uchun avval guruh yaratilgan bo\'lishi shart');
        }        
    }

    public function indexbugalt()
    {
        $data = $this->stati->where('id', 1)->first();
        if($data){
            return view('publis.statisbugalt', ['static' => $data]);
        }else{
            return back()->with('danger', 'Hozirda statistika malumotlarini ko\'ra olmaysiz. Statistikani ko\'rishingiz uchun avval guruh yaratilgan bo\'lishi shart');
        }        
    }

    public function stor2($request)
    {        
        $dataid = $this->stati->where('id', 1)->first();       
        $j = $dataid->pulis + 1;
        $sum = $dataid->summa + $request->summa;
        $qarz = $dataid->qarz + $request->summa;
        $this->stati->where('id', 1)->update([
            'pulis'=>$j,
            'summa'=>$sum,
            'qarz'=>$qarz,
        ]);        
        unset($request["_token"]);
        unset($request["summa"]);
        $this->pipls->create($request->all());
        $data = $this->pipls->where('group_id', $request->group_id)->where('cagigory', $request->cagigory)->where('seriya', $request->seriya)->first();
        $this->jamis->create([
            'publi_id' => $data->id,
            'group_id' => $data->group_id,
            'jamis' => 0
        ]);
        return redirect()->route('index',[$request->group_id])->with('success', 'Oquvchi qoshish muofaqiyatli amalga oshirildi');        
    }


    public function showindex($request)
    {
        if($request->name == "" && $request->seriya == ""){
            return back()->with('danger', 'Ismi Familiya va Passpor seriya ustunlar to\'ldirilishi shart. Oldingi 2 ta ustun ihtiyoriy. Iltimos majburiy ustunlarni to\'ldiring');
        }else{
            
            if($request->ustum == 'publis'){
                if($request->cate ==""){
                    return back()->with('danger', 'Agar o\'quvchini malumotini olishni hohlasanggiz katigoriya ustuni belgilanishi shart. Boshqa hollatlarda ixtiyoriy . Iltimos ko\'rsatilgan ustunlarni to\'ldiring');
                }else{
                    $item = $this->pipls->where('firstname', $request->name) 
                                        ->where('cagigory', $request->cate)
                                        ->where('seriya', $request->seriya)
                                        ->get();
                    $a = $this->teacher->where('firstname', $request->name)
                                        ->orWhere('lastname', $request->name)
                                        ->where('seriya', $request->seriya)
                                        ->first();
                    $b = $this->catigor->where('firstname', $request->name)
                                        ->orWhere('lastname', $request->name)
                                        ->where('seriya', $request->seriya)
                                        ->first();                   
                    if($item){                           
                        return view('publis.search',['item'=>$item,'a'=>$a, 'b'=>$b]);                                                         
                    }else{
                        return redirect('/dashbord')->with('danger', 'Bunday o\'quvchi yo\'q');
                    }
                }

            }elseif($request->ustum == 'teacher'){
                $item = $this->pipls->where('firstname', $request->name)
                                ->where('cagigory', $request->cate)                                   
                                ->where('seriya', $request->seriya)
                                ->first();
                $a = $this->teacher->where('firstname', $request->name)                                    
                                ->orWhere('lastname', $request->name)
                                ->where('seriya', $request->seriya)
                                ->first();
                $b = $this->catigor->where('firstname', $request->name)
                                ->orWhere('lastname', $request->name)
                                ->where('seriya', $request->seriya)
                                ->first();
                if($a){
                    if($a->firstname == $request->name && $a->seriya == $request->seriya ){
                        return view('publis.search',['item'=>$item,'a'=>$a, 'b'=>$b]);
                    }else{
                        return back()->with('danger', 'Bunday o\'qituvchi yo\'q');
                    }

                }else{
                    return redirect('/dashbord')->with('danger', 'Bunday o\'qituvchi yo\'q');
                }
            }elseif($request->ustum == 'instruqtor'){          
                $item = $this->pipls->where('firstname', $request->name)
                                    ->where('cagigory', $request->cate)                                   
                                    ->where('seriya', $request->seriya)
                                    ->first();
                $a = $this->teacher->where('firstname', $request->name)                                    
                                    ->orWhere('lastname', $request->name)
                                    ->where('seriya', $request->seriya)
                                    ->first();
                $b = $this->catigor->where('firstname', $request->name)
                                    ->orWhere('lastname', $request->name)
                                    ->where('seriya', $request->seriya)
                                    ->first();
                if($b){
                    if($b->firstname == $request->name && $b->seriya == $request->seriya ){
                        return view('publis.search',['item'=>$item,'a'=>$a, 'b'=>$b]);
                    }else{
                        return back()->with('danger', 'Bunday istruqto\'q yo\'q');
                    }
                }else{
                    return redirect('/dashbord')->with('danger', 'Bunday istruqto\'r yo\'q');
                }
            }
        }    
    }

    public function admingetlistsearch($request)
    {
        if($request->name == "" && $request->seriya == ""){
            return back()->with('danger', 'Ismi Familiya va Passpor seriya ustunlar to\'ldirilishi shart. Oldingi 2 ta ustun ihtiyoriy. Iltimos majburiy ustunlarni to\'ldiring');
        }else{
            
            if($request->ustum == 'publis'){
                if($request->cate ==""){
                    return back()->with('danger', 'Agar o\'quvchini malumotini olishni hohlasanggiz katigoriya ustuni belgilanishi shart. Boshqa hollatlarda ixtiyoriy . Iltimos ko\'rsatilgan ustunlarni to\'ldiring');
                }else{
                    $item = $this->pipls->where('firstname', $request->name) 
                                        ->where('cagigory', $request->cate)
                                        ->where('seriya', $request->seriya)
                                        ->get();
                    $a = $this->teacher->where('firstname', $request->name)
                                        ->orWhere('lastname', $request->name)
                                        ->where('seriya', $request->seriya)
                                        ->first();
                    $b = $this->catigor->where('firstname', $request->name)
                                        ->orWhere('lastname', $request->name)
                                        ->where('seriya', $request->seriya)
                                        ->first();                   
                    if($item){                           
                        return view('admin.search',['item'=>$item,'a'=>$a, 'b'=>$b]);                                                         
                    }else{
                        return redirect('/admin')->with('danger', 'Bunday o\'quvchi yo\'q');
                    }
                }

            }elseif($request->ustum == 'teacher'){
                $item = $this->pipls->where('firstname', $request->name)
                                ->where('cagigory', $request->cate)                                   
                                ->where('seriya', $request->seriya)
                                ->first();
                $a = $this->teacher->where('firstname', $request->name)                                    
                                ->orWhere('lastname', $request->name)
                                ->where('seriya', $request->seriya)
                                ->first();
                $b = $this->catigor->where('firstname', $request->name)
                                ->orWhere('lastname', $request->name)
                                ->where('seriya', $request->seriya)
                                ->first();
                if($a){
                    if($a->firstname == $request->name && $a->seriya == $request->seriya ){
                        return view('admin.search',['item'=>$item,'a'=>$a, 'b'=>$b]);
                    }else{
                        return back()->with('danger', 'Bunday o\'qituvchi yo\'q');
                    }

                }else{
                    return redirect('/admin')->with('danger', 'Bunday o\'qituvchi yo\'q');
                }
            }elseif($request->ustum == 'instruqtor'){          
                $item = $this->pipls->where('firstname', $request->name)
                                    ->where('cagigory', $request->cate)                                   
                                    ->where('seriya', $request->seriya)
                                    ->first();
                $a = $this->teacher->where('firstname', $request->name)                                    
                                    ->orWhere('lastname', $request->name)
                                    ->where('seriya', $request->seriya)
                                    ->first();
                $b = $this->catigor->where('firstname', $request->name)
                                    ->orWhere('lastname', $request->name)
                                    ->where('seriya', $request->seriya)
                                    ->first();
                if($b){
                    if($b->firstname == $request->name && $b->seriya == $request->seriya ){
                        return view('admin.search',['item'=>$item,'a'=>$a, 'b'=>$b]);
                    }else{
                        return back()->with('danger', 'Bunday istruqto\'q yo\'q');
                    }
                }else{
                    return redirect('/admin')->with('danger', 'Bunday istruqto\'r yo\'q');
                }
            }
        }    
    }

    public function stor3($request)
    {
        $this->stati->where('id', 1)->update([
            'group'=>$request->group,
            'pulis'=>$request->pulis,
            'summa'=>$request->summa,
            'summa2'=>$request->summa2,
            'qarz'=>$request->qarz
        ]); 
        return back()->with('succ', 'Statistika Muofaqiyatli Yangilandi');
    }

    public function statusedit()
    {
        $dt = new Carbon();
        $data = $dt->toDateString();
        $collec = $this->teacher->where('status', 1)->where('data', '<=', $data)->first();
        $cati = $this->catigor->where('status', 1)->where('data', '<=', $data)->first();
        $collection = $this->teacher->where('status', 1)->where('data', '<=', $data)->get();
        $construq = $this->catigor->where('status', 1)->where('data', '<=', $data)->get();    
        if($collec){
            if($cati){
                foreach($collection as $col){
                    if($col->data <= $data){
                        $this->teacher->where('data', '<=', $data)->update([
                            'status' => 0
                        ]);
                        foreach($construq as $col){
                            if($col->data <= $data){
                                $this->catigor->where('data', '<=', $data)->update([
                                    'status' => 0
                                ]);
                                $collection = $this->teacher->where('status', 1)->get();
                                $construq = $this->catigor->where('status', 1)->get();  
                                $teacher = $this->teacher->where('status', 0)->paginate(100);
                                $catigor = $this->catigor->where('status', 0)->paginate(100);
                                return view('publis.boshtiche',['teacher'=>$teacher, 'catigor'=>$catigor, 'collection'=>$collection, 'construq'=>$construq]);
                            }
                        }
                    }
                }
            }else{
                foreach($collection as $col){
                    if($col->data <= $data){
                        $this->teacher->where('data', '<=', $data)->update([
                            'status' => 0
                    ]);
                    $collection = $this->teacher->where('status', 1)->get();
                    $construq = $this->catigor->where('status', 1)->get();  
                    $teacher = $this->teacher->where('status', 0)->paginate(100);
                    $catigor = $this->catigor->where('status', 0)->paginate(100);
                    return view('publis.boshtiche',['teacher'=>$teacher, 'catigor'=>$catigor, 'collection'=>$collection, 'construq'=>$construq]);
                }
            }
        }  
      }elseif($cati){
        foreach($construq as $col){
            if($col->data <= $data){
                $this->catigor->where('data', '<=', $data)->update([
                    'status' => 0
                ]);
                $collection = $this->teacher->where('status', 1)->get();
                $construq = $this->catigor->where('status', 1)->get();  
                $teacher = $this->teacher->where('status', 0)->paginate(100);
                $catigor = $this->catigor->where('status', 0)->paginate(100);
                return view('publis.boshtiche',['teacher'=>$teacher, 'catigor'=>$catigor, 'collection'=>$collection, 'construq'=>$construq]);
            }
        }
      }else{
        $collection = $this->teacher->where('status', 1)->get();
        $construq = $this->catigor->where('status', 1)->get();  
        $teacher = $this->teacher->where('status', 0)->paginate(100);
        $catigor = $this->catigor->where('status', 0)->paginate(100);
        return view('publis.boshtiche',['teacher'=>$teacher, 'catigor'=>$catigor, 'collection'=>$collection, 'construq'=>$construq]);
        }
    }
    public function adminstatusedit()
    {
        $dt = new Carbon();
        $data = $dt->toDateString();
        $collec = $this->teacher->where('status', 1)->where('data', '<=', $data)->first();
        $cati = $this->catigor->where('status', 1)->where('data', '<=', $data)->first();
        $collection = $this->teacher->where('status', 1)->where('data', '<=', $data)->get();
        $construq = $this->catigor->where('status', 1)->where('data', '<=', $data)->get();    
        if($collec){
            if($cati){
                foreach($collection as $col){
                    if($col->data <= $data){
                        $this->teacher->where('data', '<=', $data)->update([
                            'status' => 0
                        ]);
                        foreach($construq as $col){
                            if($col->data <= $data){
                                $this->catigor->where('data', '<=', $data)->update([
                                    'status' => 0
                                ]);
                                $collection = $this->teacher->where('status', 1)->get();
                                $construq = $this->catigor->where('status', 1)->get();  
                                $teacher = $this->teacher->where('status', 0)->paginate(100);
                                $catigor = $this->catigor->where('status', 0)->paginate(100);
                                return view('admin.boshtiche',['teacher'=>$teacher, 'catigor'=>$catigor, 'collection'=>$collection, 'construq'=>$construq]);
                            }
                        }
                    }
                }
            }else{
                foreach($collection as $col){
                    if($col->data <= $data){
                        $this->teacher->where('data', '<=', $data)->update([
                            'status' => 0
                    ]);
                    $collection = $this->teacher->where('status', 1)->get();
                    $construq = $this->catigor->where('status', 1)->get();  
                    $teacher = $this->teacher->where('status', 0)->paginate(100);
                    $catigor = $this->catigor->where('status', 0)->paginate(100);
                    return view('admin.boshtiche',['teacher'=>$teacher, 'catigor'=>$catigor, 'collection'=>$collection, 'construq'=>$construq]);
                }
            }
        }  
      }elseif($cati){
        foreach($construq as $col){
            if($col->data <= $data){
                $this->catigor->where('data', '<=', $data)->update([
                    'status' => 0
                ]);
                $collection = $this->teacher->where('status', 1)->get();
                $construq = $this->catigor->where('status', 1)->get();  
                $teacher = $this->teacher->where('status', 0)->paginate(100);
                $catigor = $this->catigor->where('status', 0)->paginate(100);
                return view('admin.boshtiche',['teacher'=>$teacher, 'catigor'=>$catigor, 'collection'=>$collection, 'construq'=>$construq]);
            }
        }
      }else{
        $collection = $this->teacher->where('status', 1)->get();
        $construq = $this->catigor->where('status', 1)->get();  
        $teacher = $this->teacher->where('status', 0)->paginate(100);
        $catigor = $this->catigor->where('status', 0)->paginate(100);
        return view('admin.boshtiche',['teacher'=>$teacher, 'catigor'=>$catigor, 'collection'=>$collection, 'construq'=>$construq]);
        }
    }

    public function aktivticher($id)
    {
        $this->teacher->where('id', $id)->update([
            'status'=>0
        ]);
        return back()->with('success', 'O`qituvchi aktiv holatga o`tkazildi');
    }

    public function aktivinstr($id)
    {
        $this->catigor->where('id', $id)->update([
            'status'=>0
        ]);
        return back()->with('success', 'Instruqtor aktiv holatga o`tkazildi');
    }
    
    public function index4()
    {
        $date = $this->auto->all();
        return view('publis.mashina',['data'=>$date]);      
    }

    public function index44admin()
    {
        $date = $this->auto->all();
        return view('admin.mashina',['data'=>$date]);      
    }

    public function storc($request)
    {
        unset($request["_token"]);
        $this->auto->create($request->all());
        $userService = app()->make(OopServicePro::class);     
        return $userService->update3($request);
    }

    public function storcadmin($request)
    {
        unset($request["_token"]);
        $this->auto->create($request->all());
        $userService = app()->make(OopServicePro::class);     
        return $userService->update3($request);   
    }

    public function jami44($id)
    {
        $date = $this->auto->find($id);
        return view('publis.avtoedit',['date'=>$date]);
    }

    public function adminavtoedit($id)
    {
        $date = $this->auto->find($id);
        return view('admin.avtoedit',['date'=>$date]);
    }

    public function autoupdate($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $data = $this->auto->find($id);
        $data->mashina = $request->mashina;
        $data->nomer = $request->nomer;
        $data->yil = $request->yil;
        $data->save();
        return redirect()->route('new.index44')->with('success', 'Avtomobil Muofaqiyatli Yangilandi');

    } 

    public function storeccupdateadmin($request, $id)
    {
        unset($request["_token"]);
        unset($request["id"]);
        $data = $this->auto->find($id);
        $data->mashina = $request->mashina;
        $data->nomer = $request->nomer;
        $data->yil = $request->yil;
        $data->save();
        return redirect()->route('new.index44admin')->with('success', 'Avtomobil Muofaqiyatli Yangilandi');

    } 

    public function autodelet($id)
    {
        $this->auto->find($id)->delete($id);
        return back()->with('success', 'Avtomobil Muofaqiyatli O`chirildi');
    }
}
