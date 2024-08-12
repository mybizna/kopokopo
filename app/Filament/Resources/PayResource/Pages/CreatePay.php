<?php

namespace Modules\Kopokopo\Filament\Resources\PayResource\Pages;

use Modules\Kopokopo\Filament\Resources\PayResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePay extends CreateRecord
{
    protected static string $resource = PayResource::class;
}
