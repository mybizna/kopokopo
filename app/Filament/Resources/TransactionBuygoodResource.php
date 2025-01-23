<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\TransactionBuygood;

class TransactionBuygoodResource extends BaseResource
{
    protected static ?string $model = TransactionBuygood::class;

    protected static ?string $slug = 'kopokopo/transaction/buygood';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
