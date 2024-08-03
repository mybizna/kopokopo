<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class TransactionReversal extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_transaction_reversal";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status',
        'reference', 'origination_time', 'amount', 'currency', 'sending_till',
        'sender_phone_number', 'till_number', 'system_str', 'sender_first_name',
        'sender_middle_name', 'sender_last_name', 'link_self', 'link_resource',
        'location', 'faking', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('trans_id')->html('text');
        $this->fields->string('passed_created_at')->html('text');
        $this->fields->string('event_type')->html('text');
        $this->fields->string('resource_id')->html('text');
        $this->fields->string('status')->html('text');
        $this->fields->string('reference')->html('text');
        $this->fields->string('origination_time')->html('text');
        $this->fields->string('amount')->html('text');
        $this->fields->string('currency')->html('text');
        $this->fields->string('sending_till')->nullable()->html('text');
        $this->fields->string('sender_phone_number')->nullable()->html('text');
        $this->fields->string('till_number')->nullable()->html('text');
        $this->fields->string('system_str')->nullable()->html('text');
        $this->fields->string('sender_first_name')->nullable()->html('text');
        $this->fields->string('sender_middle_name')->nullable()->html('text');
        $this->fields->string('sender_last_name')->nullable()->html('text');
        $this->fields->string('link_self')->nullable()->html('text');
        $this->fields->string('link_resource')->nullable()->html('text');
        $this->fields->string('location')->nullable()->html('text');
        $this->fields->tinyInteger('faking')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }

  
}
