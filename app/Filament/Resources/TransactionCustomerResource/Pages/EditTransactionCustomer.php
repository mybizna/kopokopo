<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionCustomerResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionCustomer extends EditRecord
{
    protected static string $resource = TransactionCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
