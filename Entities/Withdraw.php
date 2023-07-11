<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Withdraw extends BaseModel
{

    protected $table = "kopokopo_withdraw";

    public $migrationDependancy = [];

    protected $fillable = ['amount', 'currency', 'callback', 'destination_type', 'origination_time', 'destination_reference', 'transaction_reference', 'published'];

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
        $table->string('amount');
        $table->string('currency');
        $table->string('callback');
        $table->string('destination_type')->nullable();
        $table->string('origination_time')->nullable();
        $table->string('destination_reference')->nullable();
        $table->string('transaction_reference')->nullable();
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
