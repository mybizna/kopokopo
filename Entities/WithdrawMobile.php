<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class WithdrawMobile extends BaseModel
{

    protected $table = "kopokopo_withdraw_mobile";

    public $migrationDependancy = [];

    protected $fillable = ['phone_number', 'first_name', 'last_name', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('phone_number');
        $table->string('first_name');
        $table->string('last_name');
        $table->tinyInteger('published')->default(false);
    }
}
