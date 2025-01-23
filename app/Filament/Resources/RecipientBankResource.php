<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\RecipientBank;

class RecipientBankResource extends BaseResource
{
    protected static ?string $model = RecipientBank::class;

    protected static ?string $slug = 'kopokopo/recipient/bank';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
