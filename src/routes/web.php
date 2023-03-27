<?php

use Illuminate\Support\Facades\Route;

Route::post('pay',[Aamarpay\PaymentGateway\Controllers\formController::class,'pay'])->name('pay');
