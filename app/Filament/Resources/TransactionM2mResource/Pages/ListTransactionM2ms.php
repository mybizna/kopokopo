<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionM2mResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionM2mResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionM2ms extends ListRecords
{
    protected static string $resource = TransactionM2mResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
