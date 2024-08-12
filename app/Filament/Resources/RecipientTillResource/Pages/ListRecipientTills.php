<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientTillResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientTillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecipientTills extends ListRecords
{
    protected static string $resource = RecipientTillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
