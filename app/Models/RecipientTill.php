<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;

class RecipientTill extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_recipient_till";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'reference', 'till_number', 'till_name', 'location', 'faking', 'result', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
