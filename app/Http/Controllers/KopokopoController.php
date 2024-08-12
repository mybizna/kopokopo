<?php

namespace Modules\Kopokopo\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Kopokopo\Classes\Kopokopo;
use Modules\Kopokopo\Classes\KopokopoAPI;

class KopokopoController extends BaseController
{

    public function polling(Request $request)
    {
        $kopokopo = new Kopokopo();

        $data = $request->all();

        $result = $kopokopo->simulate($data);

        return response()->json($result);
    }

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

    public function stkpushprocessed(Request $request)
    {
        $kopokopo = new KopokopoAPI();

        $data = $request->all();

        $result = $kopokopo->stk_webhook($data);

        return response()->json($result);
    }

    public function webhook(Request $request)
    {
        $kopokopo_api = new KopokopoAPI();

        $data = $request->all();

        $result = $kopokopo_api->webhook($data);

        return response()->json($result);
    }

    public function stk_webhook(Request $request)
    {
        $kopokopo_api = new KopokopoAPI();

        $data = $request->all();

        $result = $kopokopo_api->stk_webhook($data);

        return response()->json($result);
    }

    public function polling_webhook(Request $request)
    {
        $kopokopo_api = new KopokopoAPI();

        $data = $request->all();

        $result = $kopokopo_api->polling_webhook($data);

        return response()->json($result);
    }

    public function smsnotification_webhook(Request $request)
    {
        $kopokopo_api = new KopokopoAPI();

        $data = $request->all();

        $result = $kopokopo_api->smsnotification_webhook($data);

        return response()->json($result);
    }

    public function transfer_webhook(Request $request)
    {
        $kopokopo_api = new KopokopoAPI();

        $data = $request->all();

        $result = $kopokopo_api->transfer_webhook($data);

        return response()->json($result);
    }

    public function pay_webhook(Request $request)
    {
        $kopokopo_api = new KopokopoAPI();

        $data = $request->all();

        $result = $kopokopo_api->pay_webhook($data);

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
