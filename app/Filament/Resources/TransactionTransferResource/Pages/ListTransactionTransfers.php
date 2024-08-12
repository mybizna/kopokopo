<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionTransferResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionTransferResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionTransfers extends ListRecords
{
    protected static string $resource = TransactionTransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
