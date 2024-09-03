<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;

class TransactionB2b extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_transaction_b2b";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status',
        'reference', 'origination_time', 'amount', 'currency', 'sending_till',
        'till_number', 'system_str', 'link_self', 'link_resource', 'location',
        'faking', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
