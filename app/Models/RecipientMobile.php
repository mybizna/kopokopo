<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class RecipientMobile extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_recipient_mobile";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'reference', 'first_name', 'last_name', 'email', 'phone_number', 'network',
        'location', 'faking', 'result', 'published',
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

        $table->string('reference');
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email');
        $table->string('phone_number');
        $table->string('network');
        $table->string('location')->nullable();
        $table->text('result')->nullable();
        $table->tinyInteger('faking')->nullable()->default(0);
        $table->tinyInteger('published')->nullable()->default(0);

    }
}
