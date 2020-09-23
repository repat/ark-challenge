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

Route::name('welcome')->get('/', 'DashboardController@index');

Route::name('dashboard')->middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'DashboardController@index');

Route::prefix('transaction')->group(function () {
    Route::name('transaction.show')->get('/{transaction_id}/show', 'TransactionController@show');
    Route::name('transaction._partial')->get('/_partial', 'TransactionController@_partial');
});

Route::prefix('block')->group(function () {
    Route::name('block.show')->get('/{block_id}/show', 'BlockController@show');
    Route::name('block._partial')->get('/_partial', 'BlockController@_partial');
});

Route::prefix('wallet')->group(function () {
    Route::name('wallet')->get('/', 'WalletController@index');
    Route::name('wallet.show')->get('/{wallet_address}/show', 'WalletController@show');
    Route::name('wallet._partial')->get('/_partial', 'WalletController@_partial');
    Route::name('wallet._partial.transactions')->get('/_partial/{wallet_address}', 'WalletController@_partialTransactions');
});

Route::prefix('delegate')->group(function () {
    Route::name('delegate')->get('/', 'DelegateController@index');
    Route::name('delegate.show')->get('/{delegate_address}/show', 'DelegateController@show');
    Route::name('delegate._partial')->get('/_partial', 'DelegateController@_partial');
    Route::name('delegate._partial.transactions')->get('/_partial/{delegate_address}/transactions', 'DelegateController@_partialTransactions');
    Route::name('delegate._partial.votes')->get('/_partial/{delegate_address}/votes', 'DelegateController@_partialVotes');
});
