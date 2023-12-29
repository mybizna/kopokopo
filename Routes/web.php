<?php

use Illuminate\Support\Facades\Route;

Route::post('/kopokopo/stk/webhook', 'SenderController@stk_webhook')->name('kopokopo_stk_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/polling/webhook', 'SenderController@polling_webhook')->name('kopokopo_polling_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/smsnotification/webhook', 'SenderController@smsnotification_webhook')->name('kopokopo_smsnotification_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/transfer/webhook', 'SenderController@transfer_webhook')->name('kopokopo_transfer_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/pay/webhook', 'SenderController@pay_webhook')->name('kopokopo_pay_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/webhook', 'SenderController@webhook')->name('kopokopo_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/kopokopo/simulate', 'SenderController@simulate')->name('kopokopo_simulate')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/polling', 'SenderController@polling')->name('kopokopo_polling')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/stkpush', 'SenderController@stkpush')->name('kopokopo_stkpush')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/stkpushprocessed', 'SenderController@stkpushprocessed')->name('kopokopo_stkpushprocessed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/buygoods_transaction_received', 'SenderController@buygoods_transaction_received')->name('kopokopo_buygoods_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/buygoods_transaction_reversed', 'SenderController@buygoods_transaction_reversed')->name('kopokopo_buygoods_transaction_reversed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/b2b_transaction_received', 'SenderController@b2b_transaction_received')->name('kopokopo_b2b_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/m2m_transaction_received', 'SenderController@m2m_transaction_received')->name('kopokopo_m2m_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/settlement_transfer_completed', 'SenderController@settlement_transfer_completed')->name('kopokopo_settlement_transfer_completed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/customer_created', 'SenderController@customer_created')->name('kopokopo_customer_created')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/kopokopo/index', 'SenderController@index')->name('kopokopo_index')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/reset', 'SenderController@reset')->name('kopokopo_reset')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/verify', 'SenderController@verify')->name('kopokopo_verify')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/return', 'SenderController@paymentKopokopoReturn')->name('kopokopo_return')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/cancel', 'SenderController@paymentKopokopoCancel')->name('kopokopo_cancel')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/notify', 'SenderController@paymentKopokopoNotify')->name('kopokopo_notify')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/listener', 'SenderController@listener')->name('kopokopo_listener')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
