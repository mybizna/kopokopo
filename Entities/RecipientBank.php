<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class RecipientBank extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_recipient_bank";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'reference', 'branch_reference', 'account_name', 'account_number', 
        'settlement_method', 'location', 'faking', 'result', 'published'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

 


}
