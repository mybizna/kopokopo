<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Withdraw extends BaseModel
{

    protected $table = "kopokopo_withdraw";

    public $migrationDependancy = [];

    protected $fillable = ['clientId',  'clientSecret', 'apiKey', 'baseUrl', 'published'];

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
        $table->string('clientId');
        $table->string('clientSecret');
        $table->string('apiKey');
        $table->string('baseUrl');
        $table->tinyInteger('published')->default(false);
    }
}
