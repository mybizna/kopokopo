<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientPaybillResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientPaybillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecipientPaybills extends ListRecords
{
    protected static string $resource = RecipientPaybillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
