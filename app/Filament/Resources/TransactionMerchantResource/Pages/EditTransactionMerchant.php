<?php

namespace Modules\Kopokopo\Filament\Resources\TransactionMerchantResource\Pages;

use Modules\Kopokopo\Filament\Resources\TransactionMerchantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionMerchant extends EditRecord
{
    protected static string $resource = TransactionMerchantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
