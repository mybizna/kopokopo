<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;

class TransactionCustomer extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_transaction_customer";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'last_name', 'first_name', 'phone_number',
        'link_self', 'link_resource', 'location', 'faking', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
