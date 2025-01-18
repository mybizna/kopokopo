<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

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


    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('account_name');
        $table->string('bank_branch_ref');
        $table->string('account_number');
        $table->string('location')->nullable();
        $table->tinyInteger('faking')->nullable()->default(0);
        $table->tinyInteger('published')->nullable()->default(0);

    }
}
