<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class TransactionCustomer extends BaseModel
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "kopokopo_transaction_customer";

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
        'trans_id', 'passed_created_at', 'event_type', 'last_name', 'first_name', 'phone_number',
        'link_self', 'link_resource', 'published',
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
        $fields->name('passed_created_at')->type('text')->ordering(true);
        $fields->name('event_type')->type('text')->ordering(true);
        $fields->name('last_name')->type('text')->ordering(true);
        $fields->name('first_name')->type('text')->ordering(true);
        $fields->name('phone_number')->type('text')->ordering(true);
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
        $fields->name('last_name')->type('text')->group('w-1/2');
        $fields->name('first_name')->type('text')->group('w-1/2');
        $fields->name('phone_number')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trans_id')->type('text')->group('w-1/6');
        $fields->name('passed_created_at')->type('text')->group('w-1/6');
        $fields->name('event_type')->type('text')->group('w-1/6');
        $fields->name('last_name')->type('text')->group('w-1/6');
        $fields->name('first_name')->type('text')->group('w-1/6');
        $fields->name('phone_number')->type('text')->group('w-1/6');
        $fields->name('published')->type('switch')->group('w-1/6');

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
        $table->string('last_name');
        $table->string('first_name');
        $table->string('phone_number');
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
