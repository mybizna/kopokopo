<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Recipient extends BaseModel
{

    protected $table = "kopokopo_recipient";

    public $migrationDependancy = [];

    protected $fillable = [
        'title','type', 'system_id', 'published'
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

        $fields->name('title')->type('text')->ordering(true);
        $fields->name('type')->type('text')->ordering(true);
        $fields->name('system_id')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('type')->type('text')->group('w-1/2');
        $fields->name('system_id')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');




        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('type')->type('text')->group('w-1/6');   
        $fields->name('system_id')->type('text')->group('w-1/6');
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
        $table->string('title');
        $table->string('system_id');
        $table->string('type');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
