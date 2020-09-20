<?php

use Illuminate\Support\Facades\Route;

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

Route::name('welcome')->get('/', function () {
    return view('welcome'); // TODO
});

Route::name('dashboard')->middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'DashboardController@index');

Route::prefix('transaction')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::name('transaction.show')->get('/{transaction_id}/show', 'TransactionController@show');
    Route::name('transaction._partial')->get('/_partial', 'TransactionController@_partial');
});

Route::prefix('block')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::name('block.show')->get('/{block_id}/show', 'BlockController@show');
    Route::name('block._partial')->get('/_partial', 'BlockController@_partial');
});

Route::prefix('wallet')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::name('wallet')->get('/', 'WalletController@index');
    Route::name('wallet.show')->get('/{wallet_address}/show', 'WalletController@show');
    Route::name('wallet._partial')->get('/_partial', 'WalletController@_partial');
    Route::name('wallet._partial.address')->get('/_partial/{wallet_address}', 'WalletController@_partialAddress');
});
