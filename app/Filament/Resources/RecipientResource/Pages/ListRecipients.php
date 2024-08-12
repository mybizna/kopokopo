<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecipients extends ListRecords
{
    protected static string $resource = RecipientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
