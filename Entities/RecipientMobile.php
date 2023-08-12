<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class RecipientMobile extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_recipient_mobile";

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
        'first_name', 'last_name', 'email', 'phone_number', 'network', 'published',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['first_name', 'last_name', 'phone_number'];

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

        $fields->name('first_name')->type('text')->ordering(true);
        $fields->name('last_name')->type('text')->ordering(true);
        $fields->name('email')->type('email')->ordering(true);
        $fields->name('phone_number')->type('text')->ordering(true);
        $fields->name('network')->type('text')->ordering(true);
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

        $fields->name('first_name')->type('text')->group('w-1/2');
        $fields->name('last_name')->type('text')->group('w-1/2');
        $fields->name('email')->type('email')->group('w-1/2');
        $fields->name('phone_number')->type('text')->group('w-1/2');
        $fields->name('network')->type('text')->group('w-1/2');
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

        $fields->name('first_name')->type('text')->group('w-1/6');
        $fields->name('last_name')->type('text')->group('w-1/6');
        $fields->name('email')->type('email')->group('w-1/6');
        $fields->name('network')->type('text')->group('w-1/6');
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
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email');
        $table->string('phone_number');
        $table->string('network');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
