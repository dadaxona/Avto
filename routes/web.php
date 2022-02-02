<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\JamisummaController;
use App\Http\Controllers\KarzinaController;
use App\Http\Controllers\StatistikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('export',[ContactController::class, 'export'])->name('export');
Route::get('exports',[ContactController::class, 'exports'])->name('exports');
// Autharisation
Route::get('/', [CustomAuthController::class,'login'])->name('login');
Route::post('login-user', [CustomAuthController::class,'loginuser'])->name('login-user');
Route::get('/glavninachal', [CustomAuthController::class,'dashbord'])->middleware('isLog');
Route::get('/dashbord', [CustomAuthController::class,'dashbord'])->middleware('isLoggedIn');
Route::get('/admin', [CustomAuthController::class,'dashbord'])->middleware('id2');
Route::get('/logaut', [CustomAuthController::class,'logaut']);
Route::get('logindrekror', [CustomAuthController::class,'logindrekror'])->name('logindrekror');
Route::get('loginbugalter', [CustomAuthController::class,'loginbugalter'])->name('loginbugalter');
Route::get('loginadmin', [CustomAuthController::class,'loginadmin'])->name('loginadmin');
Route::post('paroldrekror', [CustomAuthController::class,'paroldrekror'])->name('paroldrekror');
Route::post('bugalterparol', [CustomAuthController::class,'bugalterparol'])->name('bugalterparol');
Route::post('adminparol', [CustomAuthController::class,'adminparol'])->name('adminparol');
// exstend groupadmin
Route::get('group', [CustomAuthController::class,'group'])->name('group');
Route::get('guruhyaratish', [CustomAuthController::class,'guruhyaratish'])->name('guruhyaratish');
Route::get('guruhyaratishadmin', [CustomAuthController::class,'guruhyaratishadmin'])->name('guruhyaratishadmin');
Route::get('groupadmin', [CustomAuthController::class,'groupadmin'])->name('groupadmin');
Route::get('index/{id}', [CustomAuthController::class,'index'])->name('index');
Route::get('indexadmine/{id}', [CustomAuthController::class,'indexadmine'])->name('indexadmine');
Route::get('indexs/{id}', [CustomAuthController::class,'indexs'])->name('indexs');
Route::get('indexsadmin/{id}', [CustomAuthController::class,'indexsadmin'])->name('indexsadmin');
Route::post('store', [CustomAuthController::class,'store'])->name('store');
Route::post('store.creategroup', [CustomAuthController::class,'creategroup'])->name('creategroup');
Route::post('store.creategroupadmin', [CustomAuthController::class,'creategroupadmin'])->name('creategroupadmin');
Route::post('create', [CustomAuthController::class,'create'])->name('create');
Route::post('createadmins', [CustomAuthController::class,'createadmins'])->name('createadmins');
Route::get('show/{id}', [CustomAuthController::class,'show'])->name('show');
Route::get('showadmin/{id}', [CustomAuthController::class,'showadmin'])->name('showadmin');
Route::get('edit/{id}/edit', [CustomAuthController::class,'edit'])->name('edit');
Route::get('editadmiral/{id}/edit', [CustomAuthController::class,'editadmiral'])->name('editadmiral');
Route::post('update/{id}', [CustomAuthController::class,'update'])->name('update');
Route::post('updateadmirals/{id}', [CustomAuthController::class,'updateadmirals'])->name('updateadmirals');
Route::post('storeupdate/{id}', [CustomAuthController::class,'storeupdate'])->name('storeupdate');
Route::post('storeupdateadmine/{id}', [CustomAuthController::class,'storeupdateadmine'])->name('storeupdateadmine');
Route::post('delete/{id}', [CustomAuthController::class,'destroy'])->name('delete');
//extend 2

Route::get('tolov/{id}', [CustomAuthController::class,'show2'])->name('tolov');
Route::get('index2/{id}', [CustomAuthController::class,'index2'])->name('index2');
Route::get('index2admins/{id}', [CustomAuthController::class,'index2admins'])->name('index2admins');
Route::post('store2', [CustomAuthController::class,'store2'])->name('store2');
Route::post('create2', [CustomAuthController::class,'create2'])->name('create2');
Route::get('show2/{id}', [CustomAuthController::class,'show2'])->name('show2');
Route::get('edit2/{id}/edit', [CustomAuthController::class,'edit2'])->name('edit2');
Route::get('edit2admin/{id}/edit', [CustomAuthController::class,'edit2admin'])->name('edit2admin');
Route::post('update2/{id}', [CustomAuthController::class,'update2'])->name('update2');
Route::post('updatadmin/{id}', [CustomAuthController::class,'updatadmin'])->name('updatadmin');
Route::post('delete2/{id}', [CustomAuthController::class,'destroy2'])->name('delete2');
Route::post('delete3/{id}', [CustomAuthController::class,'destroy3'])->name('delete3');
//resurse
Route::resource('jamisum', JamisummaController::class);
Route::get('adminindex', [JamisummaController::class, 'adminindex'])->name('adminindex');
Route::get('jamisumadmin/{id}', [JamisummaController::class, 'adminjami3'])->name('adminjami3');
Route::post('qanstur.update/{id}', [JamisummaController::class, 'update2'])->name('qanstur.update');
Route::post('admin.update/{id}', [JamisummaController::class, 'update2admin'])->name('qanstur.admin');
Route::post('qanstur.create', [JamisummaController::class, 'create'])->name('qanstur.create');
Route::post('admin.create', [JamisummaController::class, 'createadmin'])->name('admin.create');
Route::post('qanstur.destroy/{id}', [JamisummaController::class, 'destroy2'])->name('qanstur.destroy');
// Statistik
Route::get('statistik', [StatistikController::class, "index"])->name('statistik.index');
Route::get('statistik.indexbugalt', [StatistikController::class, "indexbugalt"])->name('statistik.indexbugalt');
Route::post('newstor', [StatistikController::class, "store"])->name('new.stor2');
Route::get('newgetlist', [StatistikController::class, "getlist"])->name('new.getlist');
Route::get('admingetlistsearch', [StatistikController::class, "admingetlistsearch"])->name('admingetlistsearch');
Route::get('newstate', [StatistikController::class, "new"])->name('new.state');
Route::get('statusedit', [StatistikController::class, "statusedit"])->name('new.statusedit');
Route::get('aktivticher/{id}', [StatistikController::class, "aktivticher"])->name('aktivticher');
Route::get('aktivinstr/{id}', [StatistikController::class, "aktivinstr"])->name('aktivinstr');
Route::get('adminstatusedit', [StatistikController::class, "adminstatusedit"])->name('adminstatusedit');
Route::get('storecc.index44', [StatistikController::class, "index44"])->name('new.index44');
Route::get('storecc.index44admin', [StatistikController::class, "index44admin"])->name('new.index44admin');
Route::post('storecc', [StatistikController::class, "storecc"])->name('new.storecc');
Route::post('storcadmin', [StatistikController::class, "storcadmin"])->name('new.storcadmin');
Route::get('storecc.avtoedit/{id}', [StatistikController::class, "avtoedit"])->name('new.avtoedit');
Route::get('adminavtoedit/{id}', [StatistikController::class, "adminavtoedit"])->name('adminavtoedit');
Route::post('storecc.update/{id}', [StatistikController::class, "storeccupdate"])->name('new.storeccupdate');
Route::post('storeccupdateadmin/{id}', [StatistikController::class, "storeccupdateadmin"])->name('storeccupdateadmin');
Route::post('storecc.delete/{id}', [StatistikController::class, "storeccdelete"])->name('new.storeccdelete');
// Karzina
Route::get('kindalik.ozgaruv',[KarzinaController::class, 'indexoz'])->name('index.ozg');
Route::get('kindalik.search',[KarzinaController::class, 'search'])->name('index.search');
Route::get('karzina.getlist',[KarzinaController::class, 'getlist'])->name('index.getlist');
Route::get('karzinaadmingetlist',[KarzinaController::class, 'admingetlist'])->name('admingetlist');
Route::post('karzina.creates/{id}',[KarzinaController::class, 'creates'])->name('creates');
Route::post('tozalashadmin',[KarzinaController::class, 'tozalashadmin'])->name('tozalashadmin');

Route::get('avtorashot',[KarzinaController::class, 'avto'])->name('avto');
Route::get('avtosearch',[KarzinaController::class, 'avtosearch'])->name('avtosearch');
Route::get('avtohisob/{id}',[KarzinaController::class, 'avtohisob'])->name('avtohisob');
Route::get('oylikmalumot/{id}',[KarzinaController::class, 'oylikmalumot'])->name('oylikmalumot');
Route::post('avtorasxot',[KarzinaController::class, 'avtorasxot'])->name('avtorasxot');