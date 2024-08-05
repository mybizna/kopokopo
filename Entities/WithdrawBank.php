<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;

class WithdrawBank extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_withdraw_bank";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['account_name', 'bank_branch_ref', 'account_number', 'location', 'faking', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

}
