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
Route::get('/filterData', [App\Http\Controllers\ViewPoController::class, 'filterData'])->name('filterData');
Route::get('/filterDataTerritory', [App\Http\Controllers\ViewPoController::class, 'filterDataTerritory'])->name('filterDataTerritory');
Route::get('/definefreeissues', [App\Http\Controllers\DefineFreeIssuesController::class, 'defineFreeIssues'])->name('definefreeissues');
Route::post('/definefreeissues/save', [App\Http\Controllers\DefineFreeIssuesController::class, 'save'])->name('definefreeissues.save');
Route::get('/definefreeissuesview', [App\Http\Controllers\DefineFreeIssuesViewController::class, 'definefreeissuesview'])->name('definefreeissuesview');
Route::get('/placingorder', [App\Http\Controllers\PlacingOrderController::class, 'placingOrder'])->name('placingorder');
Route::post('/placingorder/save', [App\Http\Controllers\PlacingOrderController::class, 'save'])->name('placingorder.save');
Route::get('/data/{id}/edit', [App\Http\Controllers\DataController::class, 'edit'])->name('data.edit');
Route::put('/data/{id}', [App\Http\Controllers\DataController::class, 'update'])->name('data.update');
Route::get('/defineFreeIssuesEdit', [App\Http\Controllers\DefineFreeIssuesController::class, 'defineFreeIssuesEdit'])->name('defineFreeIssuesEdit');
Route::get('/viewPlacingOrder', [App\Http\Controllers\ViewPlacingOrderController::class, 'viewPlacingOrder'])->name('viewPlacingOrder');
Route::get('/filterData', [App\Http\Controllers\ViewPlacingOrderController::class, 'filterData'])->name('filterData');
Route::get('/orderView', [App\Http\Controllers\OderViewController::class, 'orderView'])->name('orderView');
//Route::get('/viewIndividualOrder', [App\Http\Controllers\ViewIndividualOrderController::class, 'viewIndividualOrder'])->name('viewIndividualOrder');
Route::get('/viewIndividualOrder/{order_number}', [App\Http\Controllers\ViewIndividualOrderController::class, 'viewIndividualOrder'])->name('viewIndividualOrder');
Route::get('/defineDiscounts', [App\Http\Controllers\DefineDiscountsController::class, 'defineDiscounts'])->name('defineDiscounts');
Route::post('/defineDiscounts/save', [App\Http\Controllers\DefineDiscountsController::class, 'save'])->name('defineDiscounts.save');
Route::get('/getOrderDetails', [App\Http\Controllers\OderViewController::class, 'getOrderDetails'])->name('getOrderDetails');
Route::get('/exportPdf/{order_number}', [App\Http\Controllers\ViewIndividualOrderController::class, 'exportPdf'])->name('exportPdf');
Route::get('/exportPdf/{order_number}', [App\Http\Controllers\OderViewController::class, 'exportPdf'])->name('exportPdf');


Route::get('/export-pdf-multiple/{order_number}', [App\Http\Controllers\OderViewController::class, 'exportPdfMultiple'])->name('exportPdfMultiple');
Route::get('/viewSku', [App\Http\Controllers\AddSkuController::class, 'viewSku'])->name('viewSku');
Route::get('/editSku/{skuid}', [App\Http\Controllers\AddSkuController::class, 'editSku'])->name('editSku');
Route::put('/updateSku/{skuid}', [App\Http\Controllers\AddSkuController::class, 'updateSku'])->name('updateSku');

Route::get('/download-template', [App\Http\Controllers\AddSkuController::class, 'downloadTemplate'])->name('download.template');
Route::post('/upload-csv', [App\Http\Controllers\AddSkuController::class, 'uploadCsv'])->name('upload.csv');
Route::get('/filterDataName', [App\Http\Controllers\OderViewController::class, 'filterDataName'])->name('filterDataName');


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


