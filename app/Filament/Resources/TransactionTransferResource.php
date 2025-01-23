<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\TransactionTransfer;

class TransactionTransferResource extends BaseResource
{
    protected static ?string $model = TransactionTransfer::class;

    protected static ?string $slug = 'kopokopo/transaction/transfer';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
