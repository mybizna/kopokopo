<?php

use Illuminate\Support\Facades\Route;

Route::get('/kopokopo/simulate', 'SenderController@simulate')->name('kopokopo_simulate')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/stkpush', 'SenderController@stkpush')->name('kopokopo_stkpush')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/buygoods_transaction_received', 'SenderController@buygoods_transaction_received')->name('kopokopo_buygoods_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/buygoods_transaction_reversed', 'SenderController@buygoods_transaction_reversed')->name('kopokopo_buygoods_transaction_reversed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/b2b_transaction_received', 'SenderController@b2b_transaction_received')->name('kopokopo_b2b_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/m2m_transaction_received', 'SenderController@m2m_transaction_received')->name('kopokopo_m2m_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/settlement_transfer_completed', 'SenderController@settlement_transfer_completed')->name('kopokopo_settlement_transfer_completed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/customer_created', 'SenderController@customer_created')->name('kopokopo_customer_created')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/index', 'SenderController@index')->name('kopokopo_index')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/reset', 'SenderController@reset')->name('kopokopo_reset')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/verify', 'SenderController@verify')->name('kopokopo_verify')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/return', 'SenderController@paymentKopokopoReturn')->name('kopokopo_return')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/cancel', 'SenderController@paymentKopokopoCancel')->name('kopokopo_cancel')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/notify', 'SenderController@paymentKopokopoNotify')->name('kopokopo_notify')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/listener', 'SenderController@listener')->name('kopokopo_listener')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
