<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionReversalResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionReversalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionReversal extends EditRecord
{
    protected static string $resource = TransactionReversalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
