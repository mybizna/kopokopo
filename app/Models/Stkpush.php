<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Stkpush extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_stkpush";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'payment_channel', 'phone_number', 'currency', 'amount', 'till_number',
        'first_name', 'last_name', 'email', 'callback', 'link_self', 'link_resource',
        'customer_id', 'reference', 'notes', 'result', 'item_id',
        'module', 'model', 'location', 'faking', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function migration(Blueprint $table): void
    {

        $table->string('payment_channel')->default('M-PESA STK Push');
        $table->string('phone_number');
        $table->string('currency');
        $table->string('amount');
        $table->string('module');
        $table->string('model');
        $table->string('item_id');
        $table->string('till_number');
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->string('email')->nullable();
        $table->string('callback')->nullable();
        $table->string('customer_id')->nullable();
        $table->string('reference')->nullable();
        $table->string('notes')->nullable();
        $table->string('link_self')->nullable();
        $table->string('link_resource')->nullable();
        $table->string('location')->nullable();
        $table->text('result')->nullable();
        $table->tinyInteger('faking')->nullable()->default(0);
        $table->tinyInteger('published')->nullable()->default(0);

    }
}
