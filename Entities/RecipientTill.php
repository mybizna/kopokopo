<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Recipient extends BaseModel
{

    protected $table = "kopokopo_recipient";

    public $migrationDependancy = [];

    protected $fillable = [
        'paybill_name', 'paybill_number', 'paybill_account_number', 'published'
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
        $table->string('paybill_name');
        $table->string('paybill_number');
        $table->string('paybill_account_number');
        $table->tinyInteger('published')->default(false);
    }
}
