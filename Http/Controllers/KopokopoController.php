<?php

namespace Modules\Kopokopo\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Kopokopo\Classes\Kopokopo;

class KopokopoController extends BaseController
{

    public function simulate(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->simulate($data);

        return response()->json($result);
    }

    public function stkpush(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->stkpush($data);

        return response()->json($result);
    }

    public function buygoods_transaction_received(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->buygoods_transaction_received($data);

        return response()->json($result);
    }

    public function buygoods_transaction_reversed(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->buygoods_transaction_reversed($data);

        return response()->json($result);
    }

    public function b2b_transaction_received(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->b2b_transaction_received($data);

        return response()->json($result);
    }

    public function m2m_transaction_received(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->m2m_transaction_received($data);

        return response()->json($result);
    }

    public function settlement_transfer_completed(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->settlement_transfer_completed($data);

        return response()->json($result);
    }

    public function customer_created(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->customer_created($data);

        return response()->json($result);
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
