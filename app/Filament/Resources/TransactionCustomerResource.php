<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\TransactionCustomer;

class TransactionCustomerResource extends BaseResource
{
    protected static ?string $model = TransactionCustomer::class;

    protected static ?string $slug = 'kopokopo/transaction/customer';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
