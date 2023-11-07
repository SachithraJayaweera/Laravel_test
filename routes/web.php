<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth','isAdmin'])->group(function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userhome', [App\Http\Controllers\UserHomeController::class, 'userHome'])->name('userhome');
Route::post('/zone/save', [App\Http\Controllers\ZoneController::class, 'save'])->name('zone.save');
Route::get('/zone/get', [App\Http\Controllers\ZoneController::class, 'getAll'])->name('zone.get');
Route::get('/zone/getOne/{id}', [App\Http\Controllers\ZoneController::class, 'getOne'])->name('zone.getOne');
Route::get('/region', [App\Http\Controllers\RegionController::class, 'region'])->name('region');
Route::post('/region/save', [App\Http\Controllers\RegionController::class, 'save'])->name('region.save');
Route::get('/territory', [App\Http\Controllers\TerritoryController::class, 'territory'])->name('territory');
Route::post('/territory/save', [App\Http\Controllers\TerritoryController::class, 'save'])->name('territory.save');
Route::get('/adduser', [App\Http\Controllers\AddUserController::class, 'addUser'])->name('adduser');
Route::post('/adduser/save', [App\Http\Controllers\AddUserController::class, 'save'])->name('adduser.save');
Route::get('/addsku', [App\Http\Controllers\AddSkuController::class, 'addSku'])->name('addsku');
Route::post('/addsku/save', [App\Http\Controllers\AddSkuController::class, 'save'])->name('addsku.save');
Route::get('/addzone', [App\Http\Controllers\AddZoneController::class, 'addZone'])->name('addzone');
Route::post('/addzone/save', [App\Http\Controllers\AddZoneController::class, 'save'])->name('addzone.save');
Route::get('/addpo', [App\Http\Controllers\AddPoController::class, 'addPo'])->name('addpo');
Route::post('/addpo/save', [App\Http\Controllers\AddPoController::class, 'save'])->name('addpo.save');
Route::get('/viewpo', [App\Http\Controllers\ViewPoController::class, 'viewPo'])->name('viewpo');

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/userhome', [App\Http\Controllers\UserHomeController::class, 'index'])->name('userhome');
// Route::post('/zone/save', [App\Http\Controllers\ZoneController::class, 'save'])->name('zone.save');
// Route::get('/zone/get', [App\Http\Controllers\ZoneController::class, 'getAll'])->name('zone.get');
// Route::get('/zone/getOne/{id}', [App\Http\Controllers\ZoneController::class, 'getOne'])->name('zone.getOne');
// Route::get('/region', [App\Http\Controllers\RegionController::class, 'region'])->name('region');
// Route::post('/region/save', [App\Http\Controllers\RegionController::class, 'save'])->name('region.save');
// Route::get('/territory', [App\Http\Controllers\TerritoryController::class, 'territory'])->name('territory');
// Route::post('/territory/save', [App\Http\Controllers\TerritoryController::class, 'save'])->name('territory.save');
// Route::get('/adduser', [App\Http\Controllers\AddUserController::class, 'addUser'])->name('adduser');
// Route::post('/adduser/save', [App\Http\Controllers\AddUserController::class, 'save'])->name('adduser.save');
// Route::get('/addsku', [App\Http\Controllers\AddSkuController::class, 'addSku'])->name('addsku');
// Route::post('/addsku/save', [App\Http\Controllers\AddSkuController::class, 'save'])->name('addsku.save');
// Route::get('/addzone', [App\Http\Controllers\AddZoneController::class, 'addZone'])->name('addzone');
// Route::post('/addzone/save', [App\Http\Controllers\AddZoneController::class, 'save'])->name('addzone.save');
// Route::get('/addpo', [App\Http\Controllers\AddPoController::class, 'addPo'])->name('addpo');
// Route::post('/addpo/save', [App\Http\Controllers\AddPoController::class, 'save'])->name('addpo.save');
// Route::get('/viewpo', [App\Http\Controllers\ViewPoController::class, 'viewPo'])->name('viewpo');
// Route::get('/usehome', [App\Http\Controllers\UseHomeController::class, 'useHome'])->name('usehome');


