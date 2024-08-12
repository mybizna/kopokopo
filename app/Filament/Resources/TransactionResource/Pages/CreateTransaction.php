<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
}
