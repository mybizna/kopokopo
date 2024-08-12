<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientTillResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientTillResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecipientTill extends EditRecord
{
    protected static string $resource = RecipientTillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
