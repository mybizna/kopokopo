<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\Stkpush;

class StkpushResource extends BaseResource
{
    protected static ?string $model = Stkpush::class;

    protected static ?string $slug = 'kopokopo/stkpush';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
