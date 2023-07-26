<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class RecipientPaybill extends BaseModel
{

    protected $table = "kopokopo_recipient_paybill";

    public $migrationDependancy = [];

    protected $fillable = [
        'till_number','till_name', 'published'
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

        $fields->name('till_number')->type('text')->ordering(true);
        $fields->name('till_name')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('till_number')->type('text')->group('w-1/2');
        $fields->name('till_name')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

            $fields->name('till_number')->type('text')->group('w-1/6');
            $fields->name('till_name')->type('text')->group('w-1/6');
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
        $table->string('till_number');
        $table->string('till_name');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
