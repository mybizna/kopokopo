<?php

namespace Modules\Kopokopo\Filament\Resources\PaymentResource\Pages;

use Modules\Kopokopo\Filament\Resources\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}