<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientPaybillResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientPaybillResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecipientPaybill extends EditRecord
{
    protected static string $resource = RecipientPaybillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
