<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class RecipientMobile extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_recipient_mobile";

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'network', 'published',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['first_name', 'last_name', 'phone_number'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array <string>
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('text');
        $this->fields->string('first_name')->html('text');
        $this->fields->string('last_name')->html('text');
        $this->fields->string('email')->html('email');
        $this->fields->string('phone_number')->html('text');
        $this->fields->string('network')->html('text');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }
}
