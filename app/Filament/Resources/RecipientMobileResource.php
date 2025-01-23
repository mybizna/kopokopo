<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\RecipientMobile;

class RecipientMobileResource extends BaseResource
{
    protected static ?string $model = RecipientMobile::class;

    protected static ?string $slug = 'kopokopo/recipient/mobile';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
