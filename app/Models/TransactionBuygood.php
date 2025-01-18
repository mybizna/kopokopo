<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class TransactionBuygood extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_transaction_buygood";

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


    public function migration(Blueprint $table): void
    {
        $table->id();

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
        $table->string('location')->nullable();
        $table->tinyInteger('faking')->nullable()->default(0);
        $table->tinyInteger('published')->nullable()->default(0);

    }
}
