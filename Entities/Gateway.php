<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

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
        $table->string('client_id');
        $table->string('client_secret');
        $table->string('api_key');
        $table->string('base_url');
        $table->tinyInteger('published')->default(false);
    }
}
