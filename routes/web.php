<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\Raw_materialController;
use App\Http\Controllers\RawReportController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\RawStockOut;
use App\Http\Controllers\SalesReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;

Route::resource('news', NewsController::class);
Auth::routes(['register'=>false]);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::prefix('raw')->group(function () {
    Route::get('edit/{id}', [Raw_materialController::class,'edit']);
    Route::delete('delete/{id}', [Raw_materialController::class,'destory']);
    Route::patch('update/{id}', [Raw_materialController::class,'update']);
    Route::post('store', [Raw_materialController::class,'store']);
    Route::get('new', [Raw_materialController::class,'new']);
    Route::get('list', [Raw_materialController::class,'index']);
});



Route::prefix('out')->group(function () {
    Route::get('get_batch/{rawID}/{batchID}', [RawStockOut::class,'get_batch']);
    Route::get('get_info/{id}', [RawStockOut::class,'get_info']);
    Route::get('edit/{id}', [RawStockOut::class,'edit']);

    Route::post('delete/{id}', [RawStockOut::class,'destory']);

    Route::get('update/{id}', [RawStockOut::class,'update']);

    Route::post('store', [RawStockOut::class,'store']);
    Route::get('get_data/{id}', [RawStockOut::class,'get_data']);
    Route::get('print/{id}', [RawStockOut::class,'print']);
    Route::get('add_stock', [RawStockOut::class,'index']);
    Route::get('stock_out_invoice_list', [RawStockOut::class,'stock_out_invoice_list']);
     Route::delete('delete/{id}', [RawStockOut::class,'destory']);
});

Route::prefix('raw_report')->group(function () {
     Route::get('stock_report', [RawReportController::class,'index']);
     Route::get('single_stockout/{id}', [RawReportController::class,'single_stockout']);
     Route::post('search/{id}', [RawReportController::class,'search']);
});

Route::prefix('stock_in')->group(function () {
    Route::post('delete/{id}', [StockInController::class,'destory']);
    Route::get('edit/{id}', [StockInController::class,'edit']);
    Route::get('/stock_in_list', [StockInController::class,'index']);
    Route::get('/add', [StockInController::class,'add_stock']);
    Route::get('print/{id}', [StockInController::class,'print']);
    Route::post('/save', [StockInController::class,'save_stock_in']);
    Route::get('/get_info/{id}', [StockInController::class,'get_info']);

});

Route::prefix('sales_rpt')->group(function () {
    Route::get('summery_rpt', [SalesReportController::class,'summery_rpt']);
    Route::post('by_search', [SalesReportController::class,'by_search']);
    Route::get('details_rpt', [SalesReportController::class,'details_rpt']);
    Route::get('/depo_wise', [SalesReportController::class,'depo_wise']);
    Route::get('/customer_wise', [SalesReportController::class,'customer_wise']);
    Route::get('sales_man_wise', [SalesReportController::class,'sales_man_wise']);
    
});


Route::prefix('payment')->group(function () {
    Route::get('raw_payment/', [PaymentController::class,'payment']);
    
    
});

Route::get('/', [HomeController::class,'index']);