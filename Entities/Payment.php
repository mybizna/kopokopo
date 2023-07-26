<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class Payment extends BaseModel
{

    protected $table = "kopokopo_payment";

    public $migrationDependancy = [];

    protected $fillable = [
        'trans_id', 'type', 'event_type', 'initiation_time', 'resource_id', 'reference',
        'origination_time', 'amount', 'currency', 'sender_phone_number', 'till_number',
        'system_str', 'resource_status', 'sender_first_name', 'sender_middle_name', 'sender_last_name',
        'errors', 'metadata', 'link_self', 'link_resource', 'published',
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

        $fields->name('trans_id')->type('text')->ordering(true);
        $fields->name('type')->type('text')->ordering(true);
        $fields->name('sender_first_name')->type('text')->ordering(true);
        $fields->name('sender_middle_name')->type('text')->ordering(true);
        $fields->name('sender_last_name')->type('text')->ordering(true);
        $fields->name('event_type')->type('text')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('currency')->type('text')->ordering(true);
        $fields->name('sender_phone_number')->type('text')->ordering(true);
        $fields->name('till_number')->type('text')->ordering(true);
        $fields->name('resource_status')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trans_id')->type('text')->group('w-1/2');
        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('event_type')->type('text')->group('w-1/2');
        $fields->name('initiation_time')->type('text')->group('w-1/2');
        $fields->name('resource_id')->type('text')->group('w-1/2');
        $fields->name('reference')->type('text')->group('w-1/2');
        $fields->name('origination_time')->type('text')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('currency')->type('text')->group('w-1/2');
        $fields->name('sender_phone_number')->type('text')->group('w-1/2');
        $fields->name('till_number')->type('text')->group('w-1/2');
        $fields->name('system_str')->type('text')->group('w-1/2');
        $fields->name('resource_status')->type('text')->group('w-1/2');
        $fields->name('sender_first_name')->type('text')->group('w-1/2');
        $fields->name('sender_middle_name')->type('text')->group('w-1/2');
        $fields->name('sender_last_name')->type('text')->group('w-1/2');
        $fields->name('errors')->type('text')->group('w-1/2');
        $fields->name('metadata')->type('text')->group('w-1/2');
        $fields->name('link_self')->type('text')->group('w-1/2');
        $fields->name('link_resource')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trans_id')->type('text')->group('w-1/6');
        $fields->name('type')->type('text')->group('w-1/6');
        $fields->name('event_type')->type('text')->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');
        $fields->name('currency')->type('text')->group('w-1/6');
        $fields->name('sender_phone_number')->type('text')->group('w-1/6');
        $fields->name('till_number')->type('text')->group('w-1/6');
        $fields->name('resource_status')->type('text')->group('w-1/6');
        $fields->name('sender_first_name')->type('text')->group('w-1/6');
        $fields->name('sender_middle_name')->type('text')->group('w-1/6');
        $fields->name('sender_last_name')->type('text')->group('w-1/6');
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
        $table->string('trans_id');
        $table->string('type');
        $table->string('event_type');
        $table->string('initiation_time');
        $table->string('resource_id');
        $table->string('reference');
        $table->string('origination_time');
        $table->string('amount');
        $table->string('currency');
        $table->string('sender_phone_number')->nullable();
        $table->string('till_number')->nullable();
        $table->string('system_str')->nullable();
        $table->string('resource_status')->nullable();
        $table->string('sender_first_name')->nullable();
        $table->string('sender_middle_name')->nullable();
        $table->string('sender_last_name')->nullable();
        $table->string('errors')->nullable();
        $table->string('metadata')->nullable();
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
