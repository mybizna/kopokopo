<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class TransactionMerchant extends BaseModel
{

    protected $table = "kopokopo_transaction_merchant";

    public $migrationDependancy = [];

    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status',
        'reference', 'origination_time', 'amount', 'currency', 'sending_till',
        'till_number', 'system', 'link_self', 'link_resource', 'published',
    ];


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
        $table->string('trans_id');
        $table->string('passed_created_at');
        $table->string('event_type');
        $table->string('resource_id');
        $table->string('status');
        $table->string('origination_time');
        $table->string('amount');
        $table->string('currency');
        $table->string('sending_merchant')->nullable();
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->default(false);
    }
}
