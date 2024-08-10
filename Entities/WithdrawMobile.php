<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;

class WithdrawMobile extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_withdraw_mobile";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['phone_number', 'first_name', 'last_name', 'location', 'faking', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
