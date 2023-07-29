<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class TransactionReversal extends BaseModel
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "kopokopo_transaction_reversal";

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = [
        'trans_id', 'passed_created_at', 'event_type', 'resource_id', 'status',
        'reference', 'origination_time', 'amount', 'currency', 'sending_till',
        'sender_phone_number', 'till_number', 'system_str', 'sender_first_name',
        'sender_middle_name', 'sender_last_name', 'link_self', 'link_resource',
        'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('trans_id')->type('text')->ordering(true);
        $fields->name('sender_first_name')->type('text')->ordering(true);
        $fields->name('sender_middle_name')->type('text')->ordering(true);
        $fields->name('passed_created_at')->type('text')->ordering(true);
        $fields->name('event_type')->type('text')->ordering(true);
        $fields->name('status')->type('text')->ordering(true);
        $fields->name('origination_time')->type('text')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('currency')->type('text')->ordering(true);
        $fields->name('sending_till')->type('text')->ordering(true);
        $fields->name('sender_phone_number')->type('text')->ordering(true);
        $fields->name('till_number')->type('text')->ordering(true);
        $fields->name('system_str')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trans_id')->type('text')->group('w-1/2');
        $fields->name('sender_first_name')->type('text')->group('w-1/2');
        $fields->name('sender_middle_name')->type('text')->group('w-1/2');
        $fields->name('passed_created_at')->type('text')->group('w-1/2');
        $fields->name('event_type')->type('text')->group('w-1/2');
        $fields->name('status')->type('text')->group('w-1/2');
        $fields->name('origination_time')->type('text')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('currency')->type('text')->group('w-1/2');
        $fields->name('sending_till')->type('text')->group('w-1/2');
        $fields->name('sender_phone_number')->type('text')->group('w-1/2');
        $fields->name('till_number')->type('text')->group('w-1/2');
        $fields->name('system_str')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');
        $fields->name('reference')->type('text')->group('w-1/2');
        $fields->name('link_self')->type('text')->group('w-1/2');
        $fields->name('link_resource')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trans_id')->type('text')->group('w-1/6');
        $fields->name('sender_first_name')->type('text')->group('w-1/6');
        $fields->name('sender_middle_name')->type('text')->group('w-1/6');
        $fields->name('passed_created_at')->type('text')->group('w-1/6');
        $fields->name('event_type')->type('text')->group('w-1/6');
        $fields->name('status')->type('text')->group('w-1/6');
        $fields->name('origination_time')->type('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
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
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
