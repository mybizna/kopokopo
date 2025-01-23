<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\Transaction;

class TransactionResource extends BaseResource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $slug = 'kopokopo/transaction';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
