<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;

class RecipientMobile extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_recipient_mobile";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'reference', 'first_name', 'last_name', 'email', 'phone_number', 'network',
        'location', 'faking', 'result', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
