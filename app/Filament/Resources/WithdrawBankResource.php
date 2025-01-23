<?php

namespace Modules\Kopokopo\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\WithdrawBank;

class WithdrawBankResource extends BaseResource
{
    protected static ?string $model = WithdrawBank::class;

    protected static ?string $slug = 'kopokopo/withdraw/bank';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}
