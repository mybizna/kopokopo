<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Stkpush extends BaseModel
{

    protected $table = "kopokopo_stkpush";

    public $migrationDependancy = [];

    protected $fillable = [
        'payment_channel',  'phone_number', 'currency', 'amount', 'till_number',
        'first_name', 'last_name', 'email', 'callback', 'link_self', 'link_resource',
        'published'
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
    
    public function formBuilder(){
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

    public function filter(){
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
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
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
