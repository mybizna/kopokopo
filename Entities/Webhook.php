<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Webhook extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_webhook";

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
    protected $fillable = ['event_type', 'url', 'scope', 'scope_reference'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['event_type', 'scope', 'scope_reference'];
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

        $fields->name('event_type')->type('text')->ordering(true);
        $fields->name('url')->type('text')->ordering(true);
        $fields->name('scope')->type('text')->ordering(true);
        $fields->name('scope_reference')->type('text')->ordering(true);

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

        $fields->name('event_type')->type('text')->group('w-1/2');
        $fields->name('url')->type('text')->group('w-1/2');
        $fields->name('scope')->type('text')->group('w-1/2');
        $fields->name('scope_reference')->type('text')->group('w-1/2');

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

        $fields->name('event_type')->type('text')->group('w-1/6');
        $fields->name('url')->type('text')->group('w-1/6');
        $fields->name('scope')->type('text')->group('w-1/6');
        $fields->name('scope_reference')->type('text')->group('w-1/6');

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
        $table->enum('event_type', ['buygoods_transaction_received', 'buygoods_transaction_reversed', 'b2b_transaction_received', 'm2m_transaction_received', 'settlement_transfer_completed', 'customer_created'])->default('buygoods_transaction_received')->nullable();
        $table->string('url');
        $table->string('scope');
        $table->string('scope_reference');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
