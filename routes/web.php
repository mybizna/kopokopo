<?php

use Illuminate\Support\Facades\Route;
use Modules\Kopokopo\Http\Controllers\KopokopoController;

Route::post('/kopokopo/stk/webhook', [KopokopoController::class, 'stk_webhook'])->name('kopokopo_stk_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/polling/webhook', [KopokopoController::class, 'polling_webhook'])->name('kopokopo_polling_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/smsnotification/webhook', [KopokopoController::class, 'smsnotification_webhook'])->name('kopokopo_smsnotification_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/transfer/webhook', [KopokopoController::class, 'transfer_webhook'])->name('kopokopo_transfer_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/pay/webhook', [KopokopoController::class, 'pay_webhook'])->name('kopokopo_pay_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/webhook', [KopokopoController::class, 'webhook'])->name('kopokopo_webhook')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/kopokopo/simulate', [KopokopoController::class, 'simulate'])->name('kopokopo_simulate')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/polling', [KopokopoController::class, 'polling'])->name('kopokopo_polling')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/stkpush', [KopokopoController::class, 'stkpush'])->name('kopokopo_stkpush')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/stkpushprocessed', [KopokopoController::class, 'stkpushprocessed'])->name('kopokopo_stkpushprocessed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/buygoods_transaction_received', [KopokopoController::class, 'buygoods_transaction_received'])->name('kopokopo_buygoods_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/buygoods_transaction_reversed', [KopokopoController::class, 'buygoods_transaction_reversed'])->name('kopokopo_buygoods_transaction_reversed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/b2b_transaction_received', [KopokopoController::class, 'b2b_transaction_received'])->name('kopokopo_b2b_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/m2m_transaction_received', [KopokopoController::class, 'm2m_transaction_received'])->name('kopokopo_m2m_transaction_received')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/settlement_transfer_completed', [KopokopoController::class, 'settlement_transfer_completed'])->name('kopokopo_settlement_transfer_completed')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::post('/kopokopo/customer_created', [KopokopoController::class, 'customer_created'])->name('kopokopo_customer_created')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::get('/kopokopo/index', [KopokopoController::class, 'index'])->name('kopokopo_index')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/reset', [KopokopoController::class, 'reset'])->name('kopokopo_reset')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/verify', [KopokopoController::class, 'verify'])->name('kopokopo_verify')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/return', [KopokopoController::class, 'paymentKopokopoReturn'])->name('kopokopo_return')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/cancel', [KopokopoController::class, 'paymentKopokopoCancel'])->name('kopokopo_cancel')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/notify', [KopokopoController::class, 'paymentKopokopoNotify'])->name('kopokopo_notify')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/kopokopo/listener', [KopokopoController::class, 'listener'])->name('kopokopo_listener')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
