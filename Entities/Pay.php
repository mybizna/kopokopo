<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Pay extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_pay";

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
    protected $fillable = ['client_id',
        'destination_type', 'destination_reference', 'currency', 'amount', 'callback_url', 'location', 'faking',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['client_id', 'destination_type', 'amount'];

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

        $this->fields->increments('id')->html('hidden');
        $this->fields->foreignId('client_id')->html('recordpicker')->relation(['mpesauto', 'client']);
        $this->fields->string('destination_type')->html('text');
        $this->fields->string('destination_reference')->html('text');
        $this->fields->string('currency')->html('text');
        $this->fields->string('amount')->html('text');
        $this->fields->string('callback_url')->html('text');
        $this->fields->string('location')->nullable()->html('text');
        $this->fields->tinyInteger('faking')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['client_id', 'destination_type', 'destination_reference', 'currency', 'amount', 'callback_url', 'published'];
        $structure['filter'] = ['destination_type', 'client_id', 'faking', 'published'];

        return $structure;
    }
}
