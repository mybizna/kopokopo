<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Payment extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_payment";

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'type', 'event_type', 'initiation_time', 'resource_id', 'reference',
        'origination_time', 'amount', 'currency', 'sender_phone_number', 'till_number',
        'system_str', 'resource_status', 'sender_first_name', 'sender_middle_name', 'sender_last_name',
        'errors', 'metadata', 'link_self', 'link_resource', 'published',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['trans_id', 'reference'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields->increments('id')->html('text');
        $this->fields->string('trans_id')->html('text');
        $this->fields->string('type')->html('text');
        $this->fields->string('event_type')->html('text');
        $this->fields->string('initiation_time')->html('text');
        $this->fields->string('resource_id')->html('text');
        $this->fields->string('reference')->html('text');
        $this->fields->string('origination_time')->html('text');
        $this->fields->string('amount')->html('text');
        $this->fields->string('currency')->html('text');
        $this->fields->string('sender_phone_number')->nullable()->html('text');
        $this->fields->string('till_number')->nullable()->html('text');
        $this->fields->string('system_str')->nullable()->html('text');
        $this->fields->string('resource_status')->nullable()->html('text');
        $this->fields->string('sender_first_name')->nullable()->html('text');
        $this->fields->string('sender_middle_name')->nullable()->html('text');
        $this->fields->string('sender_last_name')->nullable()->html('text');
        $this->fields->string('errors')->nullable()->html('text');
        $this->fields->string('metadata')->nullable()->html('text');
        $this->fields->string('link_self')->nullable()->html('text');
        $this->fields->string('link_resource')->nullable()->html('text');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }
}
