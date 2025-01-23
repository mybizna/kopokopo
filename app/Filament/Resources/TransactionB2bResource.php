<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\TransactionB2b;

class TransactionB2bResource extends BaseResource
{
    protected static ?string $model = TransactionB2b::class;

    protected static ?string $slug = 'kopokopo/transaction/b2b';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
