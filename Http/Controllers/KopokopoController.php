<?php

namespace Modules\Mpesa\Http\Controllers;

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
}
