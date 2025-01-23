<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\Payment;

class PaymentResource extends BaseResource
{
    protected static ?string $model = Payment::class;

    protected static ?string $slug = 'kopokopo/payment';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
