<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Webhook extends BaseModel
{

    protected $table = "kopokopo_webhook";

    public $migrationDependancy = [];

    protected $fillable = ['event_type',  'url', 'scope', 'scope_reference'];


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
        $table->enum('event_type', ['buygoods_transaction_received', 'buygoods_transaction_reversed', 'b2b_transaction_received', 'm2m_transaction_received','settlement_transfer_completed', 'customer_created'])->default('buygoods_transaction_received')->nullable();
        $table->string('url');
        $table->string('scope');
        $table->string('scope_reference');
        $table->tinyInteger('published')->nullable()->default(0);
    }
}
