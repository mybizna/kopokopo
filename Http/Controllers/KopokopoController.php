<?php

namespace Modules\Kopokopo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Base\Http\Controllers\BaseController;

class KopokopoController extends BaseController
{

    

    public function simulate(Request $request)
    {
        $result = [];
        return response()->json($result);
    }

    public function stkpush(Request $request)
    {
        $result = [];
        return response()->json($result);
    }

    public function buygoods_transaction_received(Request $request)
    {
        $result = [];
        return response()->json($result);
    }

    public function buygoods_transaction_reversed(Request $request)
    {
        $result = [];
        return response()->json($result);
    }

    public function b2b_transaction_received(Request $request)
    {
        $result = [];
        return response()->json($result);
    }

    public function m2m_transaction_received(Request $request)
    {
        $result = [];
        return response()->json($result);
    }

    public function settlement_transfer_completed(Request $request)
    {
        $result = [];
        return response()->json($result);
    }

    public function customer_created(Request $request)
    {
        $result = [];
        return response()->json($result);
    }

    public function index(Request $request)
    {
        $context = [
            'title' => "Kopokopopayment",
        ];

        return view('index', $context);
    }

    public function reset(Request $request, $pk)
    {
        $transaction = Kopokopotransaction::find($pk);

        $transaction->user_id = null;
        $transaction->used = false;
        $transaction->save();

        return redirect()->route('manage_paymentkopokopo_transaction_update', ['pk' => $transaction->id]);
    }

    public function verify(Request $request)
    {
        $enteredMpesaCode = $request->query('entered_mpesa_code');
        $kopokopo = Kopokopotransaction::where('transaction_reference', $enteredMpesaCode)->first();
        $gateway = Gateway::where('short_name', 'kopokopo')->first();
        $converter = $gateway->currency ? $gateway->currency->rate : 1;
        $status = false;
        $payment = [];
        $message = 'No Payment received with MPesa Code: ' . $enteredMpesaCode . '.<br> Please Click "Verify Payment" after a few minutes<br>If the issue persists, contact admin.';

        if ($kopokopo && ($kopokopo->used || $kopokopo->user_id !== null)) {
            $message = 'MPesa Code: ' . $enteredMpesaCode . ' is already used. Please contact admin for assistance.';
        } elseif ($kopokopo && !$kopokopo->used) {
            $status = true;
            $payment = [
                'transaction_reference' => $kopokopo->transaction_reference,
                'amount' => $kopokopo->amount,
                'converter_amount' => $kopokopo->amount / $converter,
                'name' => $kopokopo->name,
            ];
            $message = 'Payment Successful';
        }

        $result = [
            'message' => $message,
            'status' => $status,
            'payment' => $payment,
            'list' => [],
        ];

        return JsonResponse::create($result);
    }

    public function paymentKopokopoReturn(Request $request)
    {
        $kopokopo = new Kopokopo();
        $dbManager = new DBManager();

        $payment = $kopokopo->paymentKopokopoReturn($request);

        $response = $request->input('response');
        if ($response === 'json') {
            $message = 'Payment was Successful';
            $newPayment = $dbManager->serialModel($payment);
            $response = [
                'status' => 200,
                'message' => $message,
                'payment' => $newPayment,
            ];
            return JsonResponse::create($response);
        }

        if ($payment->next_to) {
            return redirect($payment->next_to);
        } else {
            return redirect('user_payment_list');
        }
    }

    public function paymentKopokopoCancel(Request $request)
    {
        $kopokopo = new Kopokopo();
        $dbManager = new DBManager();

        $payment = $kopokopo->paymentKopokopoCancel($request);

        $response = $request->input('response');
        if ($response === 'json') {
            $message = 'Payment was Cancelled';
            $newPayment = $dbManager->serialModel($payment);
            $response = [
                'status' => 200,
                'message' => $message,
                'payment' => $newPayment,
            ];
            return JsonResponse::create($response);
        }

        if ($payment->next_to) {
            return redirect($payment->next_to);
        } else {
            return redirect('user_payment_list');
        }
    }

    public function paymentKopokopoNotify(Request $request)
    {
        $kopokopo = new Kopokopo();
        $dbManager = new DBManager();

        $payment = $kopokopo->paymentKopokopoNotify($request);

        $response = $request->input('response');
        if ($response === 'json') {
            $message = 'Payment was Successful';
            $newPayment = $dbManager->serialModel($payment);
            $response = [
                'status' => 200,
                'message' => $message,
                'payment' => $newPayment,
            ];
            return JsonResponse::create($response);
        }

        if ($payment->next_to) {
            return redirect($payment->next_to);
        } else {
            return redirect('user_payment_list');
        }
    }

    public function listener(Request $request)
    {
        $kopokopo = new Kopokopo();

        $kopokopo->syncKopokopoTransactions($request);

        $data = [
            "status" => "01",
            "description" => "Accepted",
            "subscriber_message" => 'MPESA Payment received Successfully.',
        ];

        return JsonResponse::create($data);
    }
}
