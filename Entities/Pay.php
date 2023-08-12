<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Pay extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_pay";

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
        'category', 'tags', 'callback', 'status', 'customer_id', 'notes', 'origination_time',
        'transaction_reference', 'completed', 'successful',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['category', 'customer_id'];

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

        $fields->name('category')->type('text')->ordering(true);
        $fields->name('tags')->type('text')->ordering(true);
        $fields->name('callback')->type('text')->ordering(true);
        $fields->name('status')->type('text')->ordering(true);
        $fields->name('customer_id')->type('text')->ordering(true);
        $fields->name('notes')->type('text')->ordering(true);
        $fields->name('origination_time')->type('text')->ordering(true);
        $fields->name('transaction_reference')->type('text')->ordering(true);
        $fields->name('completed')->type('switch')->ordering(true);
        $fields->name('successful')->type('switch')->ordering(true);

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

        $fields->name('category')->type('text')->group('w-1/2');
        $fields->name('tags')->type('text')->group('w-1/2');
        $fields->name('callback')->type('text')->group('w-1/2');
        $fields->name('status')->type('text')->group('w-1/2');
        $fields->name('customer_id')->type('text')->group('w-1/2');
        $fields->name('notes')->type('text')->group('w-1/2');
        $fields->name('origination_time')->type('text')->group('w-1/2');
        $fields->name('transaction_reference')->type('text')->group('w-1/2');
        $fields->name('completed')->type('switch')->group('w-1/2');
        $fields->name('successful')->type('switch')->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('category')->type('text')->group('w-1/6');
        $fields->name('tags')->type('text')->group('w-1/6');
        $fields->name('status')->type('text')->group('w-1/6');
        $fields->name('customer_id')->type('text')->group('w-1/6');
        $fields->name('transaction_reference')->type('text')->group('w-1/6');
        $fields->name('completed')->type('switch')->group('w-1/6');
        $fields->name('successful')->type('switch')->group('w-1/6');

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
        $table->string('category');
        $table->string('tags');
        $table->string('callback');
        $table->string('status');
        $table->string('customer_id');
        $table->string('notes')->nullable();
        $table->string('origination_time')->nullable();
        $table->string('transaction_reference')->nullable();
        $table->tinyInteger('completed')->nullable()->default(0);
        $table->tinyInteger('successful')->nullable()->default(0);
    }
}
