<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;

class Payment extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_payment";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'type', 'event_type', 'initiation_time', 'resource_id', 'reference',
        'origination_time', 'amount', 'currency', 'sender_phone_number', 'till_number',
        'status', 'system_str', 'resource_status', 'sender_first_name', 'sender_middle_name',
        'sender_last_name', 'errors', 'metadata', 'link_self', 'link_resource', 'location',
        'faking', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
