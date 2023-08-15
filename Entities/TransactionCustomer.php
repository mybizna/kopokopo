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
     *
     * @var string
     */
    protected $table = "kopokopo_transaction_customer";

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
        'trans_id', 'passed_created_at', 'event_type', 'last_name', 'first_name', 'phone_number',
        'link_self', 'link_resource', 'published',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['trans_id', 'first_name', 'phone_number'];

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

        $fields->name('trans_id')->html('text')->ordering(true);
        $fields->name('passed_created_at')->html('text')->ordering(true);
        $fields->name('event_type')->html('text')->ordering(true);
        $fields->name('last_name')->html('text')->ordering(true);
        $fields->name('first_name')->html('text')->ordering(true);
        $fields->name('phone_number')->html('text')->ordering(true);
        $fields->name('published')->html('switch')->ordering(true);

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

        $fields->name('trans_id')->html('text')->group('w-1/2');
        $fields->name('passed_created_at')->html('text')->group('w-1/2');
        $fields->name('event_type')->html('text')->group('w-1/2');
        $fields->name('last_name')->html('text')->group('w-1/2');
        $fields->name('first_name')->html('text')->group('w-1/2');
        $fields->name('phone_number')->html('text')->group('w-1/2');
        $fields->name('published')->html('switch')->group('w-1/2');

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

        $fields->name('trans_id')->html('text')->group('w-1/6');
        $fields->name('passed_created_at')->html('text')->group('w-1/6');
        $fields->name('event_type')->html('text')->group('w-1/6');
        $fields->name('last_name')->html('text')->group('w-1/6');
        $fields->name('first_name')->html('text')->group('w-1/6');
        $fields->name('phone_number')->html('text')->group('w-1/6');
        $fields->name('published')->html('switch')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('text');
        $this->fields->string('trans_id')->html('text');
        $this->fields->string('passed_created_at')->html('text');
        $this->fields->string('event_type')->html('text');
        $this->fields->string('last_name')->html('text');
        $this->fields->string('first_name')->html('text');
        $this->fields->string('phone_number')->html('text');
        $this->fields->string('link_self')->nullable()->html('text');
        $this->fields->string('link_resource')->nullable()->html('text');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }
}
