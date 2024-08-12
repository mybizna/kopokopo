<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionBuygoodResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionBuygoodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionBuygoods extends ListRecords
{
    protected static string $resource = TransactionBuygoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
