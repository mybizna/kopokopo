<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\Pay;

class PayResource extends BaseResource
{
    protected static ?string $model = Pay::class;

    protected static ?string $slug = 'kopokopo/pay';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
