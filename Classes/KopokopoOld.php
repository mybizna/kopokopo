<?php

namespace Modules\Kopokopo\Classes;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Modules\Account\Classes\PaymentProcessor;
use Modules\Account\Models\Transaction;
use Modules\Kopokopo\Models\Payment as Kopokopopayment;
use Modules\Kopokopo\Models\Transaction as Kopokopotransaction;

class KopokopoOld
{
    public function paymentKopokopoCancel(Request $request)
    {
        $paymentProcessor = new PaymentProcessor();
        $paymentId = $request->input('payment_id');
        $payment = $paymentProcessor->getPaymentById($paymentId);
        $paymentProcessor->cancelTransaction($payment);
        return $payment;
    }

    public function paymentKopokopoReturn(Request $request)
    {
        $paymentProcessor = new PaymentProcessor();
        $paymentId = $request->input('payment_id');
        $payment = $paymentProcessor->getPaymentById($paymentId);
        $paymentProcessor->completeTransaction($payment);
        return $payment;
    }

    public function paymentKopokopoNotify(Request $request)
    {
        $paymentProcessor = new PaymentProcessor();
        $paymentId = $request->input('payment_id');
        $mpesaCode = $request->input('mpesa_code');
        $payment = $paymentProcessor->getPaymentById($paymentId);
        $processToken = $this->processKopokopo($payment, $mpesaCode);

        if ($processToken) {
            $paymentProcessor->successfulTransaction($payment, $mpesaCode);
        } else {
            $paymentProcessor->failTransaction($payment);
        }

        return $payment;
    }

    public function processKopokopo($payment, $mpesaCode)
    {
        $paymentProcessor = new PaymentProcessor();
        $isValid = true;
        $message = '';

        $gateway = $paymentProcessor->getGatewayByName('kopokopo');

        $kopokopoObj = $this->getKopokopoTransaction($mpesaCode);

        if (!$kopokopoObj) {
            $message = $message . 'Mpesa Code (' . $mpesaCode . ') does not exist or is already used.';
            return false;
        }

        $deductions = [];

        if (!empty($payment->deductions) && strpos($payment->deductions, '{') !== false) {
            $deductions = json_decode($payment->deductions, true);
        }

        $requiredAmount = isset($deductions['amount']) ? $deductions['amount'] : $payment->amount;
        $paidAmount = $kopokopoAmount = $kopokopoObj->amount ?: 0;
        $paidAmount = $paymentProcessor->getGatewayConverterAmount($paidAmount, $gateway, false);

        $payment->code = $mpesaCode;
        $payment->gateway = $gateway;
        $payment->save();

        $paymentProcessor->savePaidAmount($payment, $requiredAmount, $paidAmount);

        if ($paidAmount <= $requiredAmount) {
            $isValid = false;
        } else {
            if ($payment->source->model_name !== 'Wallet') {
                Transaction::create([
                    'user' => $payment->user,
                    'from_user' => $payment->user,
                    'payment' => $payment,
                    'description' => $payment->description . ' [Txn:' . $payment->id . ']',
                    'money_out' => $payment->amount,
                    'year' => (new DateTime())->format('Y'),
                    'month' => (new DateTime())->format('m'),
                    'type' => 'token',
                    'source' => $payment->source,
                    'source_ident' => $payment->source_ident,
                ]);
            }
        }

        $this->saveKopokopoPayment($payment, $paidAmount, $mpesaCode, $kopokopoObj->sender_phone);
        $this->updateKopokopo($kopokopoObj, $payment->user);

        return $isValid;
    }

    public function saveKopokopoPayment($payment, $amount, $mpesaCode, $phone)
    {
        Kopokopopayment::create([
            'transaction_reference' => $mpesaCode,
            'payment' => $payment,
            'sender_phone' => $phone,
            'amount' => $amount,
        ]);
    }

    public function updateKopokopo($kopokopoObj, $user)
    {
        $kopokopoObj->used = true;
        $kopokopoObj->date_used = now();
        $kopokopoObj->user = $user;
        $kopokopoObj->save();
    }

    public function getKopokopoTransaction($mpesaCode)
    {
        if ($mpesaCode) {
            return Kopokopotransaction::where([
                ['used', false],
                ['transaction_reference', '=', trim($mpesaCode)],
            ])->first();
        } else {
            return false;
        }
    }

    public function syncKopokopoTransactions(Request $request)
    {
        $body = $request->getContent();
        if (!$body) {
            return false;
        }

        $content = json_decode($body, true);

        $counter = Kopokopotransaction::where('transaction_reference', $content['transaction_reference'])->count();

        if (!$counter) {
            Kopokopotransaction::create([
                'name' => $content['first_name'] . ' ' . $content['middle_name'] . ' ' . $content['last_name'],
                'first_name' => $content['first_name'],
                'middle_name' => $content['middle_name'],
                'last_name' => $content['last_name'],
                'service_name' => $content['service_name'],
                'business_number' => $content['business_number'],
                'transaction_reference' => $content['transaction_reference'],
                'internal_transaction_id' => $content['internal_transaction_id'],
                'transaction_timestamp' => $content['transaction_timestamp'],
                'transaction_type' => $content['transaction_type'],
                'account_number' => $content['account_number'],
                'sender_phone' => $content['sender_phone'],
                'amount' => $content['amount'],
                'currency' => $content['currency'],
            ]);
        }

        return true;
    }
}
