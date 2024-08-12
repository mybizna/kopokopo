<?php

namespace Modules\Kopokopo\Filament\Resources\RecipientMobileResource\Pages;

use Modules\Kopokopo\Filament\Resources\RecipientMobileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRecipientMobiles extends ListRecords
{
    protected static string $resource = RecipientMobileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
