<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\Webhook;

class WebhookResource extends BaseResource
{
    protected static ?string $model = Webhook::class;

    protected static ?string $slug = 'kopokopo/webhook';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
