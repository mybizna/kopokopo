<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class TransactionTransfer extends BaseModel
{

    protected $table = "kopokopo_transaction_transfer";

    public $migrationDependancy = [];

    protected $fillable = [
        'trans_id', 'created_at', 'event_type', 'resource_id', 'status', 'destination_type',
        'destination_reference', 'account_name', 'account_number', 'bank_branch_ref',
        'amount', 'currency', 'settlement_method', 'disbursements', 'link_self', 'link_resource',
        'published',
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_by', 'updated_by', 'deleted_at'];

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
        $table->string('created_at');
        $table->string('event_type');
        $table->string('resource_id');
        $table->string('status');
        $table->string('destination_type');
        $table->string('destination_reference');
        $table->string('account_name');
        $table->string('account_number');
        $table->string('bank_branch_ref');
        $table->string('amount');
        $table->string('currency');
        $table->string('settlement_method')->nullable();
        $table->string('disbursements')->nullable();
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->default(false);
    }
}
