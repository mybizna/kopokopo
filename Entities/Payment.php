<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Payment extends BaseModel
{

    protected $table = "kopokopo_payment";

    public $migrationDependancy = [];

    protected $fillable = [
        'payment_channel',  'till_number', 'first_name', 'last_name', 'phone_number', 'amount',
        'currency', 'email', 'callback', 'metadata', 'link_self', 'link_resource', 'published'
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
        $table->string('payment_channel');
        $table->string('till_number');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('phone_number');
        $table->string('amount');
        $table->string('currency');
        $table->string('email');
        $table->string('callback');
        $table->string('metadata');
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->default(false);
    }
}
