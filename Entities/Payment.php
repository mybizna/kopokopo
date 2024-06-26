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
        'status', 'system_str', 'resource_status', 'sender_first_name', 'sender_middle_name',
        'sender_last_name', 'errors', 'metadata', 'link_self', 'link_resource', 'location', 
        'faking', 'published',
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
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
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
        $this->fields->string('status')->nullable()->html('text');
        $this->fields->string('resource_status')->nullable()->html('text');
        $this->fields->string('sender_first_name')->nullable()->html('text');
        $this->fields->string('sender_middle_name')->nullable()->html('text');
        $this->fields->string('sender_last_name')->nullable()->html('text');
        $this->fields->string('errors')->nullable()->html('text');
        $this->fields->string('metadata')->nullable()->html('text');
        $this->fields->string('link_self')->nullable()->html('text');
        $this->fields->string('link_resource')->nullable()->html('text');
        $this->fields->string('location')->nullable()->html('text');
        $this->fields->tinyInteger('faking')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['sender_phone_number', 'trans_id', 'type', 'status', 'resource_id', 'reference', 'origination_time', 'amount', 'currency', 'till_number', 'published'];
        $structure['filter'] = ['sender_phone_number', 'till_number', 'published'];

        return $structure;
    }

    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = ['view' => true];
        $rights['guest'] = [];

        return $rights;
    }
}
