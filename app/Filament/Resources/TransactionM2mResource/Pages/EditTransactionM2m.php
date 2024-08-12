<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionM2mResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionM2mResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionM2m extends EditRecord
{
    protected static string $resource = TransactionM2mResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
