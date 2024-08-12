<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionMerchantResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionMerchantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionMerchants extends ListRecords
{
    protected static string $resource = TransactionMerchantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
