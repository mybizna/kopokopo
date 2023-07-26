<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class RecipientTill extends BaseModel
{

    protected $table = "kopokopo_recipient_till";

    public $migrationDependancy = [];

    protected $fillable = [
        'paybill_name', 'paybill_number', 'paybill_account_number', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('paybill_name')->type('text')->ordering(true);
        $fields->name('paybill_number')->type('text')->ordering(true);
        $fields->name('paybill_account_number')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('paybill_name')->type('text')->group('w-1/2');
        $fields->name('paybill_number')->type('text')->group('w-1/2');
        $fields->name('paybill_account_number')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('paybill_name')->type('text')->group('w-1/6');
        $fields->name('paybill_number')->type('text')->group('w-1/6');
        $fields->name('paybill_account_number')->type('text')->group('w-1/6');
        $fields->name('published')->type('switch')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('paybill_name');
        $table->string('paybill_number');
        $table->string('paybill_account_number');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
