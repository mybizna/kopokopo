<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Pay extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_pay";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['client_id', 'destination_type', 'destination_reference',
        'currency', 'amount', 'callback_url', 'location', 'faking', 'result',
        'description', 'published',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('client_id');
        $table->string('destination_type');
        $table->string('destination_reference');
        $table->string('currency');
        $table->string('amount');
        $table->string('callback_url');
        $table->string('location')->nullable();
        $table->text('description')->nullable();
        $table->text('result')->nullable();
        $table->text('metadata')->nullable();
        $table->tinyInteger('faking')->nullable()->default(0);
        $table->tinyInteger('published')->nullable()->default(0);

    }
}
