<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class RecipientBank extends BaseModel
{

    protected $table = "kopokopo_recipient_bank";

    public $migrationDependancy = [];

    protected $fillable = [
        'account_name', 'account_number', 'settlement_method', 'published'
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
        $table->string('account_name');
        $table->string('account_number');
        $table->string('settlement_method');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
