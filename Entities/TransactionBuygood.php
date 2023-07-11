<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class TransactionBuygood extends BaseModel
{

    protected $table = "kopokopo_transaction_buygood";

    public $migrationDependancy = [];

    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status',
        'reference', 'origination_time', 'amount', 'currency', 'sending_till',
        'sender_phone_number', 'till_number', 'system_str', 'sender_first_name',
        'sender_middle_name',  'sender_last_name', 'link_self', 'link_resource',
        'published',
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
        $table->string('reference');
        $table->string('origination_time');
        $table->string('amount');
        $table->string('currency');
        $table->string('sending_till')->nullable();
        $table->string('sender_phone_number')->nullable();
        $table->string('till_number')->nullable();
        $table->string('system_str')->nullable();
        $table->string('sender_first_name')->nullable();
        $table->string('sender_middle_name')->nullable();
        $table->string('sender_last_name')->nullable();
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
