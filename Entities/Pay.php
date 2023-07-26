<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Pay extends BaseModel
{

    protected $table = "kopokopo_pay";

    public $migrationDependancy = [];

    protected $fillable = [
        'category', 'tags', 'callback', 'status', 'customer_id', 'notes', 'origination_time',
        'transaction_reference', 'completed', 'successful'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public function listTable(){
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
    
    public function formBuilder(){
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

    public function filter(){
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
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
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
