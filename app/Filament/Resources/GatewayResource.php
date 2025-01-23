<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\Gateway;

class GatewayResource extends BaseResource
{
    protected static ?string $model = Gateway::class;

    protected static ?string $slug = 'kopokopo/gateway';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
