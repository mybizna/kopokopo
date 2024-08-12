<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionTransferResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionTransferResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionTransfer extends EditRecord
{
    protected static string $resource = TransactionTransferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
