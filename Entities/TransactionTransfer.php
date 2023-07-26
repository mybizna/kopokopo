<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class TransactionTransfer extends BaseModel
{

    protected $table = "kopokopo_transaction_transfer";

    public $migrationDependancy = [];

    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status', 'destination_type',
        'destination_reference', 'account_name', 'account_number', 'bank_branch_ref',
        'amount', 'currency', 'settlement_method', 'disbursements', 'link_self', 'link_resource',
        'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('trans_id')->type('text')->ordering(true);
        $fields->name('passed_created_at')->type('text')->ordering(true);
        $fields->name('event_type')->type('text')->ordering(true);
        $fields->name('status')->type('text')->ordering(true);
        $fields->name('destination_type')->type('text')->ordering(true);
        $fields->name('account_name')->type('text')->ordering(true);
        $fields->name('account_number')->type('text')->ordering(true);
        $fields->name('bank_branch_ref')->type('text')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('currency')->type('text')->ordering(true);
        $fields->name('settlement_method')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trans_id')->type('text')->group('w-1/2');
        $fields->name('passed_created_at')->type('text')->group('w-1/2');
        $fields->name('event_type')->type('text')->group('w-1/2');
        $fields->name('status')->type('text')->group('w-1/2');
        $fields->name('destination_type')->type('text')->group('w-1/2');
        $fields->name('destination_reference')->type('text')->group('w-1/2');
        $fields->name('account_name')->type('text')->group('w-1/2');
        $fields->name('account_number')->type('text')->group('w-1/2');
        $fields->name('bank_branch_ref')->type('text')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('currency')->type('text')->group('w-1/2');
        $fields->name('settlement_method')->type('text')->group('w-1/2');
        $fields->name('disbursements')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trans_id')->type('text')->group('w-1/6');
        $fields->name('status')->type('text')->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');
        $fields->name('currency')->type('text')->group('w-1/6');
        $fields->name('published')->type('switch')->group('w-1/6');

        return $fields;

    }
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
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
