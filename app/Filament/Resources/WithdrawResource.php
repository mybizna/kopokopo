<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\Withdraw;

class WithdrawResource extends BaseResource
{
    protected static ?string $model = Withdraw::class;

    protected static ?string $slug = 'kopokopo/withdraw';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
