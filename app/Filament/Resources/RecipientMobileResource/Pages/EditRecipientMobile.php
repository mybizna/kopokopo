<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientMobileResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientMobileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRecipientMobile extends EditRecord
{
    protected static string $resource = RecipientMobileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}