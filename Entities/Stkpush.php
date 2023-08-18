<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Stkpush extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_stkpush";

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
        'payment_channel', 'phone_number', 'currency', 'amount', 'till_number',
        'first_name', 'last_name', 'email', 'callback', 'link_self', 'link_resource',
        'published',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['phone_number', 'amount'];

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
        $this->fields->string('payment_channel')->html('text');
        $this->fields->string('phone_number')->html('text');
        $this->fields->string('currency')->html('text');
        $this->fields->string('amount')->html('text');
        $this->fields->string('till_number')->html('text');
        $this->fields->string('first_name')->nullable()->html('text');
        $this->fields->string('last_name')->nullable()->html('text');
        $this->fields->string('email')->nullable()->html('text');
        $this->fields->string('callback')->nullable()->html('text');
        $this->fields->string('customer_id')->nullable()->html('text');
        $this->fields->string('reference')->nullable()->html('text');
        $this->fields->string('notes')->nullable()->html('text');
        $this->fields->string('link_self')->nullable()->html('text');
        $this->fields->string('link_resource')->nullable()->html('text');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['payment_channel', 'phone_number', 'currency', 'amount', 'till_number', 'first_name', 'last_name', 'email', 'published'];
        $structure['filter'] = ['payment_channel', 'phone_number', 'email', 'published'];

        return $structure;
    }
}
