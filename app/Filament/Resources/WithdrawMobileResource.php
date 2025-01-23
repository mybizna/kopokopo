<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\WithdrawMobile;

class WithdrawMobileResource extends BaseResource
{
    protected static ?string $model = WithdrawMobile::class;

    protected static ?string $slug = 'kopokopo/withdraw/mobile';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
