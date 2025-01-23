<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\RecipientPaybill;

class RecipientPaybillResource extends BaseResource
{
    protected static ?string $model = RecipientPaybill::class;

    protected static ?string $slug = 'kopokopo/recipient/paybill';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
