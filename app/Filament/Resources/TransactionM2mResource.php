<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\TransactionM2m;

class TransactionM2mResource extends BaseResource
{
    protected static ?string $model = TransactionM2m::class;

    protected static ?string $slug = 'kopokopo/transaction/m2m';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
