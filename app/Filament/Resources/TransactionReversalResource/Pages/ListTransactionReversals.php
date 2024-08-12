<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionReversalResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionReversalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionReversals extends ListRecords
{
    protected static string $resource = TransactionReversalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
