<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class WithdrawMobile extends BaseModel
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "kopokopo_withdraw_mobile";

    /**
     * List of tables names that are need in this model.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['phone_number', 'first_name', 'last_name', 'published'];

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

        $fields->name('phone_number')->type('text')->ordering(true);
        $fields->name('first_name')->type('text')->ordering(true);
        $fields->name('last_name')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('phone_number')->type('text')->group('w-1/2');
        $fields->name('first_name')->type('text')->group('w-1/2');
        $fields->name('last_name')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('phone_number')->type('text')->group('w-1/6');
        $fields->name('first_name')->type('text')->group('w-1/6');
        $fields->name('last_name')->type('text')->group('w-1/6');
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
        $table->string('phone_number');
        $table->string('first_name');
        $table->string('last_name');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
