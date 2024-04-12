<?php

namespace Modules\Kopokopo\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class RecipientBank extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "kopokopo_recipient_bank";

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
        'reference', 'branch_reference', 'account_name', 'account_number', 
        'settlement_method', 'location', 'faking', 'result', 'published'
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['account_name', 'account_number'];

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
        $this->fields->string('reference')->html('text');
        $this->fields->string('branch_reference')->html('text');
        $this->fields->string('account_name')->html('text');
        $this->fields->string('account_number')->html('text');
        $this->fields->string('settlement_method')->html('text');
        $this->fields->string('location')->nullable()->html('text');
        $this->fields->text('result')->nullable()->html('textarea');
        $this->fields->tinyInteger('faking')->nullable()->default(0)->html('switch');
        $this->fields->tinyInteger('published')->nullable()->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['account_name', 'account_number', 'settlement_method', 'published'];
        $structure['filter'] = ['account_name', 'account_number', 'published'];

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
