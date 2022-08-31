<?php

namespace Modules\Kopokopo\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Transaction extends BaseModel
{

    protected $table = "kopokopo_transaction";

    public $migrationDependancy = [];

    protected $fillable = ['type',  'trans_id', 'created_at', 'event_type', 'resource_id', 'link_self', 'link_resource', 'published'];


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
        $table->enum('type', ['buygoods_transaction_received', 'buygoods_transaction_reversed', 'b2b_transaction_received', 'm2m_transaction_received', 'settlement_transfer_completed', 'customer_created'])->default('buygoods_transaction_received')->nullable();
        $table->string('trans_id');
        $table->string('created_at');
        $table->string('event_type');
        $table->string('resource_id');
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->tinyInteger('published')->default(false);
    }
}
