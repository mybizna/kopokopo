<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Recipient extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_recipient";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'title', 'type', 'system_id', 'location', 'faking', 'result', 'published',
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

        $table->string('title');
        $table->string('system_id');
        $table->string('type');
        $table->string('location')->nullable();
        $table->text('result')->nullable();
        $table->tinyInteger('faking')->nullable()->default(0);
        $table->tinyInteger('published')->nullable()->default(0);

    }
}
