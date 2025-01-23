<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\TransactionReversal;

class TransactionReversalResource extends BaseResource
{
    protected static ?string $model = TransactionReversal::class;

    protected static ?string $slug = 'kopokopo/transaction/reversal';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
