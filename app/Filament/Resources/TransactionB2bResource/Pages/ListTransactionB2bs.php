<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionB2bResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionB2bResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionB2bs extends ListRecords
{
    protected static string $resource = TransactionB2bResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
