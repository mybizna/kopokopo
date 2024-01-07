<?php

use Illuminate\Support\Facades\Route;
use Modules\Kopokopo\Http\Controllers\SenderController;

Route::post('/kopokopo/stk/webhook', [SenderController::class, 'stk_webhook'])->name('kopokopo_stk_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/polling/webhook', [SenderController::class, 'polling_webhook'])->name('kopokopo_polling_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/smsnotification/webhook', [SenderController::class, 'smsnotification_webhook'])->name('kopokopo_smsnotification_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/transfer/webhook', [SenderController::class, 'transfer_webhook'])->name('kopokopo_transfer_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/pay/webhook', [SenderController::class, 'pay_webhook'])->name('kopokopo_pay_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/webhook', [SenderController::class, 'webhook'])->name('kopokopo_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/kopokopo/simulate', [SenderController::class, 'simulate'])->name('kopokopo_simulate')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/polling', [SenderController::class, 'polling'])->name('kopokopo_polling')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/stkpush', [SenderController::class, 'stkpush'])->name('kopokopo_stkpush')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/stkpushprocessed', [SenderController::class, 'stkpushprocessed'])->name('kopokopo_stkpushprocessed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/buygoods_transaction_received', [SenderController::class, 'buygoods_transaction_received'])->name('kopokopo_buygoods_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/buygoods_transaction_reversed', [SenderController::class, 'buygoods_transaction_reversed'])->name('kopokopo_buygoods_transaction_reversed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/b2b_transaction_received', [SenderController::class, 'b2b_transaction_received'])->name('kopokopo_b2b_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/m2m_transaction_received', [SenderController::class, 'm2m_transaction_received'])->name('kopokopo_m2m_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/settlement_transfer_completed', [SenderController::class, 'settlement_transfer_completed'])->name('kopokopo_settlement_transfer_completed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/customer_created', [SenderController::class, 'customer_created'])->name('kopokopo_customer_created')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/kopokopo/index', [SenderController::class, 'index'])->name('kopokopo_index')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/reset', [SenderController::class, 'reset'])->name('kopokopo_reset')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/verify', [SenderController::class, 'verify'])->name('kopokopo_verify')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/return', [SenderController::class, 'paymentKopokopoReturn'])->name('kopokopo_return')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/cancel', [SenderController::class, 'paymentKopokopoCancel'])->name('kopokopo_cancel')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/notify', [SenderController::class, 'paymentKopokopoNotify'])->name('kopokopo_notify')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/listener', [SenderController::class, 'listener'])->name('kopokopo_listener')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
