<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;

class TransactionBuygood extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_transaction_buygood";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status',
        'reference', 'origination_time', 'amount', 'currency', 'sending_till',
        'sender_phone_number', 'till_number', 'system_str', 'sender_first_name',
        'sender_middle_name', 'sender_last_name', 'link_self', 'link_resource',
        'location', 'faking', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
