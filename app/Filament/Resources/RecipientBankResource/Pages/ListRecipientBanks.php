<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientBankResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientBankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecipientBanks extends ListRecords
{
    protected static string $resource = RecipientBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
