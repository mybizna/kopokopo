<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class WithdrawBank extends BaseModel
{

    protected $table = "kopokopo_withdraw_bank";

    public $migrationDependancy = [];

    protected $fillable = ['account_name',  'bank_branch_ref', 'account_number', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_by', 'updated_by', 'deleted_at'];

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {

        $table->increments('id');
        $table->string('account_name');
        $table->string('bank_branch_ref');
        $table->string('account_number');
        $table->tinyInteger('published')->default(false);
    }
}
