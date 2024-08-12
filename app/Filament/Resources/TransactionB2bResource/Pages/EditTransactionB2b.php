<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionB2bResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionB2bResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionB2b extends EditRecord
{
    protected static string $resource = TransactionB2bResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
