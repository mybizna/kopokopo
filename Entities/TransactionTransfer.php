<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
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
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status', 'destination_type',
        'destination_reference', 'account_name', 'account_number', 'bank_branch_ref',
        'amount', 'currency', 'settlement_method', 'disbursements', 'link_self', 'link_resource',
        'published',
    ];



    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['trans_id','amount'];
    
 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
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

    /**
     * Function for defining list of fields in form view.
     * 
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
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

    /**
     * Function for defining list of fields in form view.
     * 
     * @return FormBuilder
     */
    public function filter(): FormBuilder
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
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
