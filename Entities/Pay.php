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
    protected $fillable = [
        'category', 'tags', 'callback', 'status', 'customer_id', 'notes', 'origination_time',
        'transaction_reference', 'completed', 'successful',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['category', 'customer_id'];

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

        $this->fields->string('category')->html('text');
        $this->fields->string('tags')->html('text');
        $this->fields->string('callback')->html('text');
        $this->fields->string('status')->html('text');
        $this->fields->string('customer_id')->html('text');
        $this->fields->string('notes')->nullable()->html('text');
        $this->fields->string('origination_time')->nullable()->html('text');
        $this->fields->string('transaction_reference')->nullable()->html('text');
        $this->fields->tinyInteger('completed')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('successful')->nullable()->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure = [
            'table' => ['category', 'tags', 'status', 'origination_time', 'transaction_reference', 'completed', 'successful'],
            'filter' => ['category', 'status', 'transaction_reference', 'completed', 'successful'],
        ];

        return $structure;
    }
}
