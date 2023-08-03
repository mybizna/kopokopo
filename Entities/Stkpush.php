<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Stkpush extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_stkpush";

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
        'payment_channel', 'phone_number', 'currency', 'amount', 'till_number',
        'first_name', 'last_name', 'email', 'callback', 'link_self', 'link_resource',
        'published',
    ];

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

        $fields->name('payment_channel')->type('text')->ordering(true);
        $fields->name('phone_number')->type('text')->ordering(true);
        $fields->name('currency')->type('text')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('till_number')->type('text')->ordering(true);
        $fields->name('first_name')->type('text')->ordering(true);
        $fields->name('last_name')->type('text')->ordering(true);
        $fields->name('email')->type('text')->ordering(true);
        $fields->name('callback')->type('text')->ordering(true);
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

        $fields->name('payment_channel')->type('text')->group('w-1/2');
        $fields->name('phone_number')->type('text')->group('w-1/2');
        $fields->name('currency')->type('text')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('till_number')->type('text')->group('w-1/2');
        $fields->name('first_name')->type('text')->group('w-1/2');
        $fields->name('last_name')->type('text')->group('w-1/2');
        $fields->name('email')->type('text')->group('w-1/2');
        $fields->name('callback')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');
        $fields->name('customer_id')->type('text')->group('w-1/2');
        $fields->name('reference')->type('text')->group('w-1/2');
        $fields->name('notes')->type('text')->group('w-1/2');
        $fields->name('link_self')->type('text')->group('w-1/2');
        $fields->name('link_resource')->type('text')->group('w-1/2');

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

        $fields->name('payment_channel')->type('text')->group('w-1/6');
        $fields->name('phone_number')->type('text')->group('w-1/6');
        $fields->name('currency')->type('text')->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');
        $fields->name('till_number')->type('text')->group('w-1/6');
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
        $table->string('payment_channel');
        $table->string('phone_number');
        $table->string('currency');
        $table->string('amount');
        $table->string('till_number');
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->string('email')->nullable();
        $table->string('callback')->nullable();
        $table->string('customer_id')->nullable();
        $table->string('reference')->nullable();
        $table->string('notes')->nullable();
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
