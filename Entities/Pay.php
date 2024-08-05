<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;

class Pay extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_pay";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['client_id', 'destination_type', 'destination_reference',
        'currency', 'amount', 'callback_url', 'location', 'faking', 'result',
        'description', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
