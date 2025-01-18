<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Withdraw extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_withdraw";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['amount', 'currency', 'callback', 'destination_type', 'origination_time', 'destination_reference', 'transaction_reference', 'location', 'faking', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('amount');
        $table->string('currency');
        $table->string('callback');
        $table->string('destination_type')->nullable();
        $table->string('origination_time')->nullable();
        $table->string('destination_reference')->nullable();
        $table->string('transaction_reference')->nullable();
        $table->string('location')->nullable();
        $table->tinyInteger('faking')->nullable()->default(0);
        $table->tinyInteger('published')->nullable()->default(0);

    }
}
