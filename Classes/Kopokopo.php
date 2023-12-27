<?php

namespace Modules\Kopokopo\Classes;

use Modules\Kopokopo\Entities\Stkpush;
use Modules\Kopokopo\Entities\Transaction;
use Modules\Kopokopo\Entities\TransactionB2b;
use Modules\Kopokopo\Entities\TransactionCustomer;
use Modules\Kopokopo\Entities\TransactionM2m;
use Modules\Kopokopo\Entities\TransactionReversal;
use Modules\Kopokopo\Entities\Withdraw;

class Kopokopo
{
    public function simulate($data)
    {
        $result = [];
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
