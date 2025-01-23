<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\Recipient;

class RecipientResource extends BaseResource
{
    protected static ?string $model = Recipient::class;

    protected static ?string $slug = 'kopokopo/recipient';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
