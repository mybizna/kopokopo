<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class RecipientMobile extends BaseModel
{

    protected $table = "kopokopo_recipient_mobile";

    public $migrationDependancy = [];

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'network', 'published'
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email');
        $table->string('phone_number');
        $table->string('network');
        $table->tinyInteger('published')->default(false);
    }
}
