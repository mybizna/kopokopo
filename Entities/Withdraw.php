<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;

class Withdraw extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_withdraw";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['amount', 'currency', 'callback', 'destination_type', 'origination_time', 'destination_reference', 'transaction_reference', 'location', 'faking', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
