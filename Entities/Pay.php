<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Pay extends BaseModel
{

    protected $table = "kopokopo_pay";

    public $migrationDependancy = [];

    protected $fillable = [
        'category', 'tags', 'callback', 'status', 'customer_id', 'notes', 'origination_time',
        'transaction_reference', 'completed', 'successful'
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
        $table->string('category');
        $table->string('tags');
        $table->string('callback');
        $table->string('status');
        $table->string('customer_id');
        $table->string('notes')->nullable();
        $table->string('origination_time')->nullable();
        $table->string('transaction_reference')->nullable();
        $table->tinyInteger('completed')->nullable()->default(0);
        $table->tinyInteger('successful')->nullable()->default(0);
    }
}
