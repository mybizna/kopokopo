<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Webhook extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_webhook";

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
    protected $fillable = ['event_type', 'url', 'scope', 'scope_reference', 'location', 'faking'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['event_type', 'scope', 'scope_reference'];
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

        $type = ['buygoods_transaction_received', 'buygoods_transaction_reversed', 'b2b_transaction_received', 'm2m_transaction_received', 'settlement_transfer_completed', 'customer_created'];

        $this->fields->increments('id')->html('hidden');
        $this->fields->enum('event_type', $type)->options($type)->default('buygoods_transaction_received')->nullable()->html('select');
        $this->fields->string('url')->html('text');
        $this->fields->string('scope')->html('text');
        $this->fields->string('scope_reference')->html('text');
        $this->fields->string('location')->nullable()->html('text');
        $this->fields->tinyInteger('faking')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['event_type', 'url', 'scope', 'scope_reference'];
        $structure['filter'] = ['event_type', 'scope', 'scope_reference'];

        return $structure;
    }

    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {

    }
}
