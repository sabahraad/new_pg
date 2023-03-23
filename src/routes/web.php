<?php

use Illuminate\Support\Facades\Route;

// Route::get('form', [Aamarpay\PaymentGateway\Controllers\formController::class,'form'])->name('form');
Route::post('pay',[Aamarpay\PaymentGateway\Controllers\formController::class,'pay'])->name('pay');
Route::post('success',[Aamarpay\PaymentGateway\Controllers\formController::class,'success'])->name('success');
Route::post('fail',[Aamarpay\PaymentGateway\Controllers\formController::class,'fail'])->name('fail');
