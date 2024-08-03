<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class TransactionTransfer extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_transaction_transfer";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status', 'destination_type',
        'destination_reference', 'account_name', 'account_number', 'bank_branch_ref',
        'amount', 'currency', 'settlement_method', 'disbursements', 'link_self', 'link_resource',
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
        $this->fields->string('destination_type')->html('text');
        $this->fields->string('destination_reference')->html('text');
        $this->fields->string('account_name')->html('text');
        $this->fields->string('account_number')->html('text');
        $this->fields->string('bank_branch_ref')->html('text');
        $this->fields->string('amount')->html('text');
        $this->fields->string('currency')->html('text');
        $this->fields->string('settlement_method')->nullable()->html('text');
        $this->fields->string('disbursements')->nullable()->html('text');
        $this->fields->string('link_self')->nullable()->html('text');
        $this->fields->string('link_resource')->nullable()->html('text');
        $this->fields->string('location')->nullable()->html('text');
        $this->fields->tinyInteger('faking')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }

  



}
