<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Payment extends BaseModel
{

    protected $table = "kopokopo_payment";

    public $migrationDependancy = [];

    protected $fillable = [
        'trans_id',  'type', 'event_type', 'initiation_time', 'resource_id', 'reference',
        'origination_time', 'amount', 'currency', 'sender_phone_number', 'till_number',
        'system_str', 'resource_status', 'sender_first_name', 'sender_middle_name', 'sender_last_name',
        'errors', 'metadata', 'link_self', 'link_resource', 'published'
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
        $table->string('type');
        $table->string('event_type');
        $table->string('initiation_time');
        $table->string('resource_id');
        $table->string('reference');
        $table->string('origination_time');
        $table->string('amount');
        $table->string('currency');
        $table->string('sender_phone_number')->nullable();
        $table->string('till_number')->nullable();
        $table->string('system_str')->nullable();
        $table->string('resource_status')->nullable();
        $table->string('sender_first_name')->nullable();
        $table->string('sender_middle_name')->nullable();
        $table->string('sender_last_name')->nullable();
        $table->string('errors')->nullable();
        $table->string('metadata')->nullable();
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->default(false);
    }
}
