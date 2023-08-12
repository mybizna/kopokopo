<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Withdraw extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_withdraw";

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
    protected $fillable = ['amount', 'currency', 'callback', 'destination_type', 'origination_time', 'destination_reference', 'transaction_reference', 'published'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['amount', 'transaction_reference'];

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

        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('currency')->type('text')->ordering(true);
        $fields->name('callback')->type('text')->ordering(true);
        $fields->name('destination_type')->type('text')->ordering(true);
        $fields->name('origination_time')->type('text')->ordering(true);
        $fields->name('destination_reference')->type('text')->ordering(true);
        $fields->name('transaction_reference')->type('text')->ordering(true);
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

        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('currency')->type('text')->group('w-1/2');
        $fields->name('callback')->type('text')->group('w-1/2');
        $fields->name('destination_type')->type('text')->group('w-1/2');
        $fields->name('origination_time')->type('text')->group('w-1/2');
        $fields->name('destination_reference')->type('text')->group('w-1/2');
        $fields->name('transaction_reference')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

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

        $fields->name('amount')->type('text')->group('w-1/6');
        $fields->name('currency')->type('text')->group('w-1/6');
        $fields->name('callback')->type('text')->group('w-1/6');
        $fields->name('destination_type')->type('text')->group('w-1/6');
        $fields->name('origination_time')->type('text')->group('w-1/6');
        $fields->name('destination_reference')->type('text')->group('w-1/6');
        $fields->name('transaction_reference')->type('text')->group('w-1/6');
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
        $table->string('amount');
        $table->string('currency');
        $table->string('callback');
        $table->string('destination_type')->nullable();
        $table->string('origination_time')->nullable();
        $table->string('destination_reference')->nullable();
        $table->string('transaction_reference')->nullable();
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
