<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientBankResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientBankResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecipientBank extends EditRecord
{
    protected static string $resource = RecipientBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
