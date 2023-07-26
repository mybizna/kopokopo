<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Withdraw extends BaseModel
{

    protected $table = "kopokopo_withdraw";

    public $migrationDependancy = [];

    protected $fillable = ['amount', 'currency', 'callback', 'destination_type', 'origination_time', 'destination_reference', 'transaction_reference', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public function listTable(){
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
    
    public function formBuilder(){
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

    public function filter(){
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
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
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
