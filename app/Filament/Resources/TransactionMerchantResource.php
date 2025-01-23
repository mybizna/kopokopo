<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\TransactionMerchant;

class TransactionMerchantResource extends BaseResource
{
    protected static ?string $model = TransactionMerchant::class;

    protected static ?string $slug = 'kopokopo/transaction/merchant';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
