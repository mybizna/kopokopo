<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\RecipientTill;

class RecipientTillResource extends BaseResource
{
    protected static ?string $model = RecipientTill::class;

    protected static ?string $slug = 'kopokopo/recipient/till';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}
