<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecipient extends EditRecord
{
    protected static string $resource = RecipientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
