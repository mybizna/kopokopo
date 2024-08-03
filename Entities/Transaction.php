<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Transaction extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_transaction";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['type', 'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'link_self', 'link_resource', 'location', 'faking', 'published'];

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

        $type = ['buygoods_transaction_received', 'buygoods_transaction_reversed', 'b2b_transaction_received', 'm2m_transaction_received', 'settlement_transfer_completed', 'customer_created'];

        $this->fields->increments('id')->html('hidden');
        $this->fields->enum('type', $type)->options($type)->default('buygoods_transaction_received')->nullable()->html('select');
        $this->fields->string('trans_id')->html('text');
        $this->fields->string('passed_created_at')->html('text');
        $this->fields->string('event_type')->html('text');
        $this->fields->string('resource_id')->html('text');
        $this->fields->string('link_self')->nullable()->html('text');
        $this->fields->string('link_resource')->nullable()->html('text');
        $this->fields->string('location')->nullable()->html('text');
        $this->fields->tinyInteger('faking')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }



}
