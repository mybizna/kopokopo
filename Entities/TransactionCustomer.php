<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class TransactionCustomer extends BaseModel
{

    protected $table = "kopokopo_transaction_customer";

    public $migrationDependancy = [];

    protected $fillable = [
        'trans_id', 'created_at', 'event_type', 'last_name', 'first_name', 'phone_number',
        'link_self', 'link_resource', 'published',
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
        $table->string('trans_id');
        $table->string('created_at');
        $table->string('event_type');
        $table->string('last_name');
        $table->string('first_name');
        $table->string('phone_number');
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->default(false);
    }
}
