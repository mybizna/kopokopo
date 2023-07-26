<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class Webhook extends BaseModel
{

    protected $table = "kopokopo_webhook";

    public $migrationDependancy = [];

    protected $fillable = ['event_type', 'url', 'scope', 'scope_reference'];

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

        $fields->name('event_type')->type('text')->ordering(true);
        $fields->name('url')->type('text')->ordering(true);
        $fields->name('scope')->type('text')->ordering(true);
        $fields->name('scope_reference')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('event_type')->type('text')->group('w-1/2');
        $fields->name('url')->type('text')->group('w-1/2');
        $fields->name('scope')->type('text')->group('w-1/2');
        $fields->name('scope_reference')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter()
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
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->enum('event_type', ['buygoods_transaction_received', 'buygoods_transaction_reversed', 'b2b_transaction_received', 'm2m_transaction_received', 'settlement_transfer_completed', 'customer_created'])->default('buygoods_transaction_received')->nullable();
        $table->string('url');
        $table->string('scope');
        $table->string('scope_reference');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
