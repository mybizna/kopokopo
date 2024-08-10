<?php

namespace Modules\Kopokopo\Classes;

use Modules\Kopokopo\Models\Stkpush;
use Modules\Kopokopo\Models\Transaction;
use Modules\Kopokopo\Models\TransactionB2b;
use Modules\Kopokopo\Models\TransactionCustomer;
use Modules\Kopokopo\Models\TransactionM2m;
use Modules\Kopokopo\Models\TransactionReversal;
use Modules\Kopokopo\Models\Withdraw;

class Kopokopo
{

    public function simulate($data)
    {
        $result = [];
        return response()->json($result);
    }

    public function stkpushprocessed($data)
    {
        $result = Stkpush::create($data);

        return response()->json($result);
    }

    public function stkpush($data)
    {
        $result = Stkpush::create($data);

        return response()->json($result);
    }

    public function buygoods_transaction_received($data)
    {

        $result = Transaction::create($data);

        return response()->json($result);
    }

    public function buygoods_transaction_reversed($data)
    {
        $result = TransactionReversal::create($data);
        return response()->json($result);
    }

    public function b2b_transaction_received($data)
    {
        $result = TransactionB2b::create($data);
        return response()->json($result);
    }

    public function m2m_transaction_received($data)
    {
        $result = TransactionM2m::create($data);
        return response()->json($result);
    }

    public function settlement_transfer_completed($data)
    {
        $result = $result = Withdraw::create($data);
        return response()->json($result);
    }

    public function customer_created($data)
    {
        $result = TransactionCustomer::create($data);
        return response()->json($result);
    }

}
