<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Recipient extends BaseModel
{

    protected $table = "kopokopo_recipient";

    public $migrationDependancy = [];

    protected $fillable = [
        'till_number','till_name', 'published'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_by', 'updated_by', 'deleted_at'];

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
        $table->tinyInteger('published')->default(false);
    }
}
