<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Gateway extends BaseModel
{

    protected $table = "kopokopo_gateway";

    public $migrationDependancy = [];

    protected $fillable = ['client_id',  'client_secret', 'api_key', 'base_url', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('client_id')->type('text')->ordering(true);
        $fields->name('client_secret')->type('text')->ordering(true);
        $fields->name('api_key')->type('text')->ordering(true);
        $fields->name('base_url')->type('text')->ordering(true);
        $fields->name('published')->type('switch')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();


        $fields->name('client_id')->type('text')->group('w-1/2');
        $fields->name('client_secret')->type('text')->group('w-1/2');
        $fields->name('api_key')->type('text')->group('w-1/2');
        $fields->name('base_url')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('client_id')->type('text')->group('w-1/2');
        $fields->name('published')->type('switch')->group('w-1/2');

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
        $table->string('client_id');
        $table->string('client_secret');
        $table->string('api_key');
        $table->string('base_url');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
