<?php

namespace Modules\Kopokopo\Models;

use Modules\Base\Models\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Gateway extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_gateway";

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['client_id', 'client_secret', 'api_key', 'base_url', 'published'];

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
        $table->string('client_secret');
        $table->string('api_key');
        $table->string('base_url');
        $table->tinyInteger('published')->nullable()->default(0);

    }
}
