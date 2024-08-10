<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;

class TransactionTransfer extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_transaction_transfer";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status', 'destination_type',
        'destination_reference', 'account_name', 'account_number', 'bank_branch_ref',
        'amount', 'currency', 'settlement_method', 'disbursements', 'link_self', 'link_resource',
        'location', 'faking', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
