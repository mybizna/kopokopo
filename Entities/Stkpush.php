<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;

class Stkpush extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_stkpush";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'payment_channel', 'phone_number', 'currency', 'amount', 'till_number',
        'first_name', 'last_name', 'email', 'callback', 'link_self', 'link_resource',
        'customer_id', 'reference', 'notes', 'result', 'item_id',
        'module', 'model', 'location', 'faking', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
