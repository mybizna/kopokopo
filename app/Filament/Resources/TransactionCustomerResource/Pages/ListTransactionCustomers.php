<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionCustomerResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionCustomers extends ListRecords
{
    protected static string $resource = TransactionCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
