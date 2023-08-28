<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Withdraw extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_withdraw";

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
    protected $fillable = ['amount', 'currency', 'callback', 'destination_type', 'origination_time', 'destination_reference', 'transaction_reference', 'published'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['amount', 'transaction_reference'];

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
        $this->fields->string('amount')->html('text');
        $this->fields->string('currency')->html('text');
        $this->fields->string('callback')->html('text');
        $this->fields->string('destination_type')->nullable()->html('text');
        $this->fields->string('origination_time')->nullable()->html('text');
        $this->fields->string('destination_reference')->nullable()->html('text');
        $this->fields->string('transaction_reference')->nullable()->html('text');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['amount', 'currency', 'destination_type', 'origination_time', 'destination_reference', 'transaction_reference', 'published'];
        $structure['filter'] = ['amount', 'destination_reference', 'published'];

        return $structure;
    }
}
