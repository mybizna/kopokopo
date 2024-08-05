<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;

class Webhook extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_webhook";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['event_type', 'url', 'scope', 'scope_reference', 'location', 'faking'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
