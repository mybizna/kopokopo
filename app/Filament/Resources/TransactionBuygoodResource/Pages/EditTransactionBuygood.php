<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionBuygoodResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionBuygoodResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionBuygood extends EditRecord
{
    protected static string $resource = TransactionBuygoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
